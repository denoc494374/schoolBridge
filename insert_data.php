<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$basePath = __DIR__;
require $basePath . '/vendor/autoload.php';

try {
    $app = require $basePath . '/bootstrap/app.php';
    $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    // Import Models
    use App\Models\Organization;
    use App\Models\Scholarship;
    use App\Models\User;
    use Spatie\Permission\Models\Role;
    use Illuminate\Support\Facades\Hash;

    echo "Creating roles...\n";
    foreach (['admin', 'provider', 'student'] as $roleName) {
        Role::firstOrCreate(['name' => $roleName]);
    }
    echo "Roles created.\n";

    echo "Creating users...\n";
    User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'role' => 'admin',
        'password' => Hash::make('password'),
    ])->assignRole('admin');

    User::factory()->create([
        'name' => 'Provider User',
        'email' => 'provider@example.com',
        'role' => 'provider',
        'password' => Hash::make('password'),
    ])->assignRole('provider');

    $student = User::factory()->create([
        'name' => 'Student User',
        'email' => 'student@example.com',
        'role' => 'student',
        'password' => Hash::make('password'),
    ]);
    $student->assignRole('student');
    $student->studentProfile()->create([
        'location' => 'Manila',
        'course' => 'Computer Science',
        'year_level' => 'Third Year',
        'income_bracket' => 'Low Income',
        'gpa' => 3.8,
        'age' => 20,
    ]);
    echo "Users created.\n";

    echo "Creating test organization...\n";
    $org = Organization::create([
        'name' => 'Test Education Foundation',
        'description' => 'A foundation dedicated to providing scholarships',
        'email' => 'testorg@example.com',
        'address' => '123 Main Street, Manila, Philippines',
        'contact_person' => 'John Doe',
        'phone' => '02-1234-5678',
        'website' => 'https://example.com',
        'status' => 'verified',
    ]);
    echo "Organization created.\n";

    echo "Creating scholarships...\n";
    Scholarship::create([
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
            'income_brackets' => ['Low Income', 'Middle Income'],
            'min_gpa' => 3.5,
        ],
    ]);

    Scholarship::create([
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
            'income_brackets' => ['Low Income'],
            'min_gpa' => 3.8,
        ],
    ]);

    Scholarship::create([
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
            'income_brackets' => ['Low Income', 'Middle Income', 'High Income'],
            'min_gpa' => 3.0,
        ],
    ]);

    Scholarship::create([
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
            'income_brackets' => ['Low Income', 'Middle Income'],
            'min_gpa' => 3.7,
        ],
    ]);

    echo "Scholarships created successfully!\n";
    echo "Total scholarships: " . Scholarship::count() . "\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
