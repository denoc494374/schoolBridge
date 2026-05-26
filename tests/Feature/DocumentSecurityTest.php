<?php

use App\Models\Application;
use App\Models\Document;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

beforeEach(function () {
    Storage::fake('local');

    $this->student = User::factory()->create();
    $this->student->assignRole('student');
    $this->student->studentProfile()->create([
        'gpa' => 3.8,
        'course' => 'Computer Science',
        'year_level' => 'Year 2',
        'location' => 'California',
        'income_bracket' => 'Medium',
    ]);

    $this->otherStudent = User::factory()->create();
    $this->otherStudent->assignRole('student');

    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'Education Plus',
        'address' => '200 Main St',
        'contact_email' => 'edu@plus.org',
        'verified_at' => now(),
    ]);

    $this->scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'General Scholarship',
        'description' => 'Open to all',
        'slots' => 10,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $this->application = Application::create([
        'scholarship_id' => $this->scholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'remarks' => 'Please consider my application',
        'submitted_at' => now(),
    ]);

    // Store a fake document file
    Storage::disk('local')->put(
        'applications/'.$this->application->id.'/transcript.pdf',
        'fake pdf content'
    );

    $this->document = Document::create([
        'application_id' => $this->application->id,
        'file_path' => 'applications/'.$this->application->id.'/transcript.pdf',
        'document_type' => 'transcript',
        'uploaded_at' => now(),
    ]);
});

test('student can download their own application documents', function () {
    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->addMinutes(15)
    );

    $response = $this->actingAs($this->student)
        ->get($url);

    $response->assertOk();
    $response->assertHeader('content-disposition');
});

test('provider can download documents from their scholarship applications', function () {
    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->addMinutes(15)
    );

    $response = $this->actingAs($this->provider)
        ->get($url);

    $response->assertOk();
    $response->assertHeader('content-disposition');
});

test('student cannot download documents from other students applications', function () {
    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->addMinutes(15)
    );

    $response = $this->actingAs($this->otherStudent)
        ->get($url);

    $response->assertForbidden();
});

test('other provider cannot download documents from different organization applications', function () {
    $otherProvider = User::factory()->create();
    $otherProvider->assignRole('provider');
    $otherProvider->organization()->create([
        'name' => 'Other Education',
        'address' => '300 Oak St',
        'contact_email' => 'other@edu.org',
        'verified_at' => now(),
    ]);

    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->addMinutes(15)
    );

    $response = $this->actingAs($otherProvider)
        ->get($url);

    $response->assertForbidden();
});

test('unsigned document download request is rejected', function () {
    $response = $this->actingAs($this->student)
        ->get(route('documents.download', $this->document));

    $response->assertForbidden();
});

test('expired signed document download link is rejected', function () {
    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->subMinutes(1) // Already expired
    );

    $response = $this->actingAs($this->student)
        ->get($url);

    $response->assertForbidden();
});

test('unauthenticated user cannot download documents even with valid signed url', function () {
    $url = URL::signedRoute(
        'documents.download',
        ['document' => $this->document],
        now()->addMinutes(15)
    );

    $response = $this->get($url);

    $response->assertRedirect(route('login'));
});
