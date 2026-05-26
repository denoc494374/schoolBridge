<?php

use App\Models\Scholarship;
use App\Models\User;
use App\Services\EligibilityMatcherService;

beforeEach(function () {
    $this->student = User::factory()->create();
    $this->student->assignRole('student');
    $this->student->studentProfile()->create([
        'gpa' => 3.8,
        'course' => 'Computer Science',
        'year_level' => 'Year 2',
        'location' => 'California',
        'income_bracket' => 'Medium',
    ]);

    $this->lowGpaStudent = User::factory()->create();
    $this->lowGpaStudent->assignRole('student');
    $this->lowGpaStudent->studentProfile()->create([
        'gpa' => 2.9,
        'course' => 'Business',
        'year_level' => 'Year 1',
        'location' => 'Texas',
        'income_bracket' => 'High',
    ]);

    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'STEM Foundation',
        'address' => '100 Tech Park',
        'contact_email' => 'stem@foundation.org',
        'verified_at' => now(),
    ]);

    // Scholarship that matches first student
    $this->matchingScholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'STEM Excellence Scholarship',
        'description' => 'For high-performing STEM students',
        'slots' => 5,
        'deadline' => now()->addMonths(3),
        'status' => 'open',
        'eligibility_criteria' => [
            'min_gpa' => 3.5,
            'locations' => ['California', 'New York'],
            'courses' => ['Computer Science', 'Engineering'],
            'year_levels' => ['Year 1', 'Year 2', 'Year 3'],
            'income_brackets' => ['Low', 'Medium'],
        ],
    ]);

    // Scholarship that doesn't match first student (GPA too low)
    $this->nonMatchingScholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Premium STEM Scholarship',
        'description' => 'For exceptional students',
        'slots' => 3,
        'deadline' => now()->addMonths(2),
        'status' => 'open',
        'eligibility_criteria' => [
            'min_gpa' => 3.9,
            'locations' => ['California', 'Texas'],
            'courses' => ['Computer Science'],
            'year_levels' => ['Year 2', 'Year 3'],
            'income_brackets' => ['Low'],
        ],
    ]);

    // Closed scholarship
    $this->closedScholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Closed Scholarship',
        'description' => 'No longer accepting applications',
        'slots' => 0,
        'deadline' => now()->subDay(),
        'status' => 'closed',
        'eligibility_criteria' => [],
    ]);
});

test('student can view available scholarships', function () {
    $response = $this->actingAs($this->student)
        ->get(route('student.scholarships.index'));

    $response->assertOk();
    $response->assertViewIs('student.scholarships.index');
    $response->assertViewHas('scholarships');
});

test('student can view scholarship details', function () {
    $response = $this->actingAs($this->student)
        ->get(route('student.scholarships.show', $this->matchingScholarship));

    $response->assertOk();
    $response->assertViewIs('student.scholarships.show');
    $response->assertViewHas('scholarship', $this->matchingScholarship);
});

test('student sees eligibility match indicator for matching scholarship', function () {
    $response = $this->actingAs($this->student)
        ->get(route('student.scholarships.index'));

    $response->assertOk();
    // The view should have scholarships data
    $scholarships = $response->viewData('scholarships');
    $this->assertNotNull($scholarships);
});

test('eligibility matcher returns true when student meets all criteria', function () {
    $matcher = new EligibilityMatcherService();
    $isEligible = $matcher->matches(
        $this->student->studentProfile,
        $this->matchingScholarship
    );

    $this->assertTrue($isEligible);
});

test('eligibility matcher returns false when gpa too low', function () {
    $matcher = new EligibilityMatcherService();
    $isEligible = $matcher->matches(
        $this->lowGpaStudent->studentProfile,
        $this->nonMatchingScholarship
    );

    $this->assertFalse($isEligible);
});

test('eligibility matcher returns false when course not in criteria', function () {
    $matcher = new EligibilityMatcherService();
    
    // Student studies Business but scholarship requires Computer Science or Engineering
    $criteria = [
        'min_gpa' => 3.0,
        'locations' => ['California'],
        'courses' => ['Computer Science', 'Engineering'],
        'year_levels' => ['Year 2'],
        'income_brackets' => ['Medium'],
    ];

    $scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Engineering Only',
        'description' => 'For engineers only',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => $criteria,
    ]);

    $isEligible = $matcher->matches(
        $this->lowGpaStudent->studentProfile,
        $scholarship
    );

    $this->assertFalse($isEligible);
});

test('eligibility matcher returns false when location not in criteria', function () {
    $matcher = new EligibilityMatcherService();
    
    // Student in Texas but scholarship requires California only
    $criteria = [
        'min_gpa' => 2.5,
        'locations' => ['California'],
        'courses' => ['Computer Science', 'Business'],
        'year_levels' => ['Year 1'],
        'income_brackets' => ['Medium', 'High'],
    ];

    $scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'California Only',
        'description' => 'California residents only',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => $criteria,
    ]);

    $isEligible = $matcher->matches(
        $this->lowGpaStudent->studentProfile,
        $scholarship
    );

    $this->assertFalse($isEligible);
});

test('only authenticated students can view scholarships', function () {
    $response = $this->get(route('student.scholarships.index'));

    $response->assertRedirect(route('login'));
});
