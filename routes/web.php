<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/debug/test-as-provider', function () {
    $provider = \App\Models\User::where('email', 'provider-test@example.com')->first();
    
    if (!$provider) {
        return response()->json(['error' => 'Provider user not found']);
    }
    
    // Check if provider has the role
    if (!$provider->hasRole('provider')) {
        return response()->json([
            'error' => 'Provider does not have the provider role',
            'roles' => $provider->getRoleNames(),
        ]);
    }
    
    // Check if provider has organization
    $org = $provider->organization;
    if (!$org) {
        return response()->json(['error' => 'Provider has no organization']);
    }
    
    // Get scholarships
    $scholarships = $org->scholarships()->latest()->paginate(10);
    
    // Render the view as if the provider is logged in
    Auth::loginUsingId($provider->id);
    
    return view('provider.scholarships.index', [
        'scholarships' => $scholarships
    ]);
})->name('debug.test-as-provider');

Route::get('/debug/test-layout', function () {
    return view('components.app-layout', [
        'slot' => '<h1>Test Content</h1><p>This is a test</p>'
    ]);
})->name('debug.test-layout');

Route::get('/debug/provider-scholarships', function () {
    $provider = \App\Models\User::where('email', 'provider-test@example.com')->first();
    
    if (!$provider) {
        return response()->json(['error' => 'Provider not found']);
    }
    
    $org = $provider->organization;
    
    if (!$org) {
        return response()->json(['error' => 'Organization not found for provider']);
    }
    
    $scholarships = $org->scholarships()->latest()->paginate(10);
    
    return response()->json([
        'provider' => $provider->name,
        'provider_email' => $provider->email,
        'organization' => $org->name,
        'organization_id' => $org->id,
        'scholarships_count' => $scholarships->total(),
        'scholarships' => $scholarships->map(fn($s) => [
            'id' => $s->id,
            'title' => $s->title,
            'description' => Str::limit($s->description, 160),
            'status' => $s->status,
            'deadline' => $s->deadline,
            'organization_id' => $s->organization_id,
        ])
    ]);
})->name('debug.provider-scholarships');

Route::get('/debug/provider-page-html', function () {
    // Simulate what the provider would see
    $provider = \App\Models\User::where('email', 'provider-test@example.com')->first();
    
    if (!$provider) {
        return response()->json(['error' => 'Provider not found']);
    }
    
    $org = $provider->organization;
    
    if (!$org) {
        return response()->json(['error' => 'Organization not found']);
    }
    
    $scholarships = $org->scholarships()->latest()->paginate(10);
    
    $html = view('provider.scholarships.index', compact('scholarships'))->render();
    
    return response($html)->header('Content-Type', 'text/html');
})->name('debug.provider-page-html');

Route::get('/setup/scholarships', function () {
    try {
        // Create provider user if doesn't exist
        $providerUser = \App\Models\User::firstOrCreate(
            ['email' => 'provider-test@example.com'],
            [
                'name' => 'Test Provider',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'provider',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );
        $providerUser->assignRole('provider');

        // Create organization linked to provider
        $org = \App\Models\Organization::updateOrCreate(
            ['user_id' => $providerUser->id],
            [
                'name' => 'Test Education Foundation',
                'address' => '123 Main Street, Manila, Philippines',
                'contact_email' => 'contact@testorg.com',
                'verified_at' => now(),
            ]
        );

        // Create or update student user
        $studentUser = \App\Models\User::firstOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'Student User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'student',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );
        $studentUser->assignRole('student');

        // Create student profile if doesn't exist
        $studentUser->studentProfile()->updateOrCreate(
            ['user_id' => $studentUser->id],
            [
                'age' => 20,
                'gpa' => 3.8,
                'course' => 'Computer Science',
                'year_level' => 'Third Year',
                'address' => 'Manila',
            ]
        );

        // Delete existing scholarships for this org
        \App\Models\Scholarship::where('organization_id', $org->id)->delete();

        // Create test scholarships
        $scholarships = [
            [
                'title' => 'Engineering Excellence Scholarship',
                'description' => 'A prestigious scholarship for outstanding engineering students pursuing a career in technology and innovation.',
                'slots' => 5,
                'deadline' => now()->addMonths(3),
            ],
            [
                'title' => 'Health Sciences Merit Award',
                'description' => 'Supporting the next generation of healthcare professionals with comprehensive financial aid.',
                'slots' => 3,
                'deadline' => now()->addMonths(2),
            ],
            [
                'title' => 'Business Leaders Tomorrow',
                'description' => 'Invest in future business leaders with our comprehensive scholarship program.',
                'slots' => 4,
                'deadline' => now()->addMonths(4),
            ],
            [
                'title' => 'STEM Innovation Grant',
                'description' => 'Supporting innovative research and development in science, technology, engineering, and mathematics.',
                'slots' => 6,
                'deadline' => now()->addMonths(5),
            ]
        ];

        foreach ($scholarships as $s) {
            \App\Models\Scholarship::create([
                'organization_id' => $org->id,
                'title' => $s['title'],
                'description' => $s['description'],
                'slots' => $s['slots'],
                'deadline' => $s['deadline'],
                'status' => 'open',
                'eligibility_criteria' => [
                    'locations' => ['Manila', 'Cebu', 'Davao'],
                    'courses' => ['Computer Science', 'Engineering', 'Business', 'Medicine'],
                    'year_levels' => ['First Year', 'Second Year', 'Third Year', 'Fourth Year'],
                    'min_gpa' => 3.0,
                ],
            ]);
        }

        return response()->json([
            'message' => 'Setup complete!',
            'student' => $studentUser->email,
            'student_password' => 'password',
            'provider' => $providerUser->email,
            'provider_password' => 'password',
            'organization' => $org->name,
            'scholarships_created' => count($scholarships),
            'links' => [
                'student_scholarships' => 'http://localhost:8000/student/scholarships',
                'provider_scholarships' => 'http://localhost:8000/provider/scholarships',
                'login' => 'http://localhost:8000/login'
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
})->name('setup.scholarships');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/debug/scholarships', function () {
        return view('debug.scholarships');
    })->name('debug.scholarships');

    Route::get('/debug/insert-scholarships', function () {
        try {
            $org = \App\Models\Organization::firstOrCreate(
                ['email' => 'testorg@example.com'],
                [
                    'name' => 'Test Education Foundation',
                    'description' => 'A foundation dedicated to providing scholarships',
                    'address' => '123 Main Street, Manila, Philippines',
                    'contact_person' => 'John Doe',
                    'phone' => '02-1234-5678',
                    'website' => 'https://example.com',
                    'status' => 'verified',
                ]
            );

            \App\Models\Scholarship::create([
                'organization_id' => $org->id,
                'title' => 'Engineering Excellence Scholarship',
                'description' => 'A prestigious scholarship for outstanding engineering students pursuing a career in technology and innovation.',
                'slots' => 5,
                'deadline' => now()->addMonths(3),
                'status' => 'open',
                'eligibility_criteria' => [
                    'locations' => ['Manila', 'Cebu', 'Davao'],
                    'courses' => ['Computer Science', 'Civil Engineering', 'Electrical Engineering'],
                    'year_levels' => ['Second Year', 'Third Year'],
                    'min_gpa' => 3.5,
                ],
            ]);

            \App\Models\Scholarship::create([
                'organization_id' => $org->id,
                'title' => 'Health Sciences Merit Award',
                'description' => 'Supporting the next generation of healthcare professionals with comprehensive financial aid.',
                'slots' => 3,
                'deadline' => now()->addMonths(2),
                'status' => 'open',
                'eligibility_criteria' => [
                    'locations' => ['Manila', 'Quezon City', 'Makati'],
                    'courses' => ['Medicine', 'Nursing', 'Public Health'],
                    'year_levels' => ['First Year', 'Second Year'],
                    'min_gpa' => 3.8,
                ],
            ]);

            \App\Models\Scholarship::create([
                'organization_id' => $org->id,
                'title' => 'Business Leaders Tomorrow',
                'description' => 'Invest in future business leaders with our comprehensive scholarship program.',
                'slots' => 4,
                'deadline' => now()->addMonths(4),
                'status' => 'open',
                'eligibility_criteria' => [
                    'locations' => ['National', 'All regions'],
                    'courses' => ['Business Administration', 'Commerce', 'Finance'],
                    'year_levels' => ['Second Year', 'Third Year', 'Fourth Year'],
                    'min_gpa' => 3.0,
                ],
            ]);

            \App\Models\Scholarship::create([
                'organization_id' => $org->id,
                'title' => 'STEM Innovation Grant',
                'description' => 'Supporting innovative research and development in science, technology, engineering, and mathematics.',
                'slots' => 6,
                'deadline' => now()->addMonths(5),
                'status' => 'open',
                'eligibility_criteria' => [
                    'locations' => ['Manila', 'Caloocan', 'Las Piñas'],
                    'courses' => ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
                    'year_levels' => ['Third Year', 'Fourth Year'],
                    'min_gpa' => 3.7,
                ],
            ]);

            return response()->json(['message' => 'Scholarships created successfully!', 'count' => 4]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('debug.insert-scholarships');

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('provider')) {
            return redirect()->route('provider.dashboard');
        }

        return redirect()->route('student.dashboard');
    })->name('dashboard');

    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\StudentDashboardController::class, 'index'])->name('dashboard');
        Route::get('scholarships', [App\Http\Controllers\StudentScholarshipController::class, 'index'])->name('scholarships.index');
        Route::get('scholarships/{scholarship}', [App\Http\Controllers\StudentScholarshipController::class, 'show'])->name('scholarships.show');
        Route::get('scholarships/{scholarship}/apply', [App\Http\Controllers\StudentApplicationController::class, 'create'])->name('applications.create');
        Route::post('scholarships/{scholarship}/apply', [App\Http\Controllers\StudentApplicationController::class, 'store'])->name('applications.store');
        Route::get('applications', [App\Http\Controllers\StudentApplicationController::class, 'index'])->name('applications.index');
        Route::get('applications/{application}', [App\Http\Controllers\StudentApplicationController::class, 'show'])->name('applications.show');
        Route::delete('applications/{application}', [App\Http\Controllers\StudentApplicationController::class, 'destroy'])->name('applications.destroy');
    });

    Route::middleware('role:provider')->prefix('provider')->name('provider.')->group(function () {
        Route::view('dashboard', 'dashboard.provider')->name('dashboard');

        
        Route::get('organization/edit', [App\Http\Controllers\ProviderOrganizationController::class, 'edit'])->name('organization.edit');
        Route::post('organization', [App\Http\Controllers\ProviderOrganizationController::class, 'store'])->name('organization.store');
        Route::put('organization', [App\Http\Controllers\ProviderOrganizationController::class, 'update'])->name('organization.update');
        
        Route::get('scholarships', [App\Http\Controllers\ProviderScholarshipController::class, 'index'])->name('scholarships.index');
        Route::get('scholarships/create', [App\Http\Controllers\ProviderScholarshipController::class, 'create'])->name('scholarships.create');
        Route::post('scholarships', [App\Http\Controllers\ProviderScholarshipController::class, 'store'])->name('scholarships.store');
        Route::get('scholarships/{scholarship}', [App\Http\Controllers\ProviderScholarshipController::class, 'show'])->name('scholarships.show');
        Route::get('scholarships/{scholarship}/edit', [App\Http\Controllers\ProviderScholarshipController::class, 'edit'])->name('scholarships.edit');
        Route::put('scholarships/{scholarship}', [App\Http\Controllers\ProviderScholarshipController::class, 'update'])->name('scholarships.update');
        Route::delete('scholarships/{scholarship}', [App\Http\Controllers\ProviderScholarshipController::class, 'destroy'])->name('scholarships.destroy');
        Route::get('applications', [App\Http\Controllers\ProviderApplicationController::class, 'index'])->name('applications.index');
        Route::get('applications/{application}', [App\Http\Controllers\ProviderApplicationController::class, 'show'])->name('applications.show');
        Route::put('applications/{application}', [App\Http\Controllers\ProviderApplicationController::class, 'update'])->name('applications.update');
    });

    Route::get('documents/{document}/download', [App\Http\Controllers\DocumentController::class, 'download'])
        ->middleware(['signed'])
        ->name('documents.download');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::view('dashboard', 'dashboard.admin')->name('dashboard');
        Route::get('providers', [App\Http\Controllers\AdminProviderController::class, 'index'])->name('providers.index');
        Route::get('providers/{organization}', [App\Http\Controllers\AdminProviderController::class, 'show'])->name('providers.show');
        Route::post('providers/{organization}/verify', [App\Http\Controllers\AdminProviderController::class, 'verify'])->name('providers.verify');
        Route::post('providers/{organization}/revoke', [App\Http\Controllers\AdminProviderController::class, 'revoke'])->name('providers.revoke');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/student', [ProfileController::class, 'updateStudentProfile'])->name('profile.student.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
