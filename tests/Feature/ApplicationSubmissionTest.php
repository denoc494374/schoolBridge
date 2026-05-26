<?php

use App\Models\Application;
use App\Models\Document;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('local');
    
    $this->student = User::factory()->create();
    $this->student->assignRole('student');
    $this->student->studentProfile()->create([
        'gpa' => 3.8,
        'course' => 'Computer Science',
        'year_level' => 'Year 1',
        'location' => 'New York',
        'income_bracket' => 'Low',
    ]);

    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'Tech Foundation',
        'address' => '123 Main St',
        'contact_email' => 'tech@foundation.org',
        'verified_at' => now(),
    ]);

    $this->scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Tech Scholarship 2024',
        'description' => 'For aspiring developers',
        'slots' => 10,
        'deadline' => now()->addMonths(2),
        'status' => 'open',
        'eligibility_criteria' => [
            'min_gpa' => 3.5,
            'locations' => ['New York', 'California'],
            'courses' => ['Computer Science', 'Engineering'],
            'year_levels' => ['Year 1', 'Year 2'],
            'income_brackets' => ['Low', 'Medium'],
        ],
    ]);
});

test('student can view scholarship application form', function () {
    $response = $this->actingAs($this->student)
        ->get(route('student.applications.create', $this->scholarship));

    $response->assertOk();
    $response->assertViewIs('student.applications.create');
    $response->assertViewHas('scholarship', $this->scholarship);
});

test('student cannot apply to closed scholarship', function () {
    $this->scholarship->update(['status' => 'closed']);

    $response = $this->actingAs($this->student)
        ->get(route('student.applications.create', $this->scholarship));

    $response->assertNotFound();
});

test('student cannot apply after deadline', function () {
    $this->scholarship->update(['deadline' => now()->subDay()]);

    $response = $this->actingAs($this->student)
        ->get(route('student.applications.create', $this->scholarship));

    $response->assertNotFound();
});

test('student cannot apply twice to same scholarship', function () {
    Application::create([
        'scholarship_id' => $this->scholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'submitted_at' => now(),
    ]);

    $response = $this->actingAs($this->student)
        ->get(route('student.applications.create', $this->scholarship));

    $response->assertRedirect(route('student.scholarships.show', $this->scholarship));
    $response->assertSessionHas('error', 'You have already applied to this scholarship.');
});

test('student can submit application with multiple file uploads', function () {
    $files = [
        UploadedFile::fake()->create('transcript.pdf', 100),
        UploadedFile::fake()->create('recommendation.pdf', 100),
        UploadedFile::fake()->create('essay.pdf', 100),
    ];

    $response = $this->actingAs($this->student)
        ->post(route('student.applications.store', $this->scholarship), [
            'remarks' => 'I am an excellent candidate for this scholarship.',
            'documents' => $files,
        ]);

    $response->assertRedirect(route('student.scholarships.show', $this->scholarship));
    $response->assertSessionHas('success');

    // Verify application created
    $application = Application::where('scholarship_id', $this->scholarship->id)
        ->where('student_id', $this->student->id)
        ->first();
    
    $this->assertNotNull($application);
    $this->assertEquals('pending', $application->status);
    $this->assertEquals('I am an excellent candidate for this scholarship.', $application->remarks);
    
    // Verify documents created
    $this->assertCount(3, $application->documents);
    
    // Verify files stored in non-public disk
    foreach ($application->documents as $document) {
        Storage::disk('local')->assertExists($document->file_path);
    }
});

test('student can view their applications', function () {
    Application::create([
        'scholarship_id' => $this->scholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'submitted_at' => now(),
    ]);

    $response = $this->actingAs($this->student)
        ->get(route('student.applications.index'));

    $response->assertOk();
    $response->assertViewIs('student.applications.index');
    $response->assertViewHas('applications');
});
