<?php

use App\Models\Scholarship;
use App\Models\User;

beforeEach(function () {
    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'Education Trust',
        'address' => '456 Oak Ave',
        'contact_email' => 'trust@edu.org',
        'verified_at' => now(),
    ]);

    $this->otherProvider = User::factory()->create();
    $this->otherProvider->assignRole('provider');
    $this->otherProvider->organization()->create([
        'name' => 'Other Foundation',
        'address' => '789 Pine St',
        'contact_email' => 'other@foundation.org',
        'verified_at' => now(),
    ]);
});

test('provider can view scholarships index', function () {
    Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Test Scholarship',
        'description' => 'Test description',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $response = $this->actingAs($this->provider)
        ->get(route('provider.scholarships.index'));

    $response->assertOk();
    $response->assertViewIs('provider.scholarships.index');
    $response->assertViewHas('scholarships');
});

test('provider can view scholarship create form', function () {
    $response = $this->actingAs($this->provider)
        ->get(route('provider.scholarships.create'));

    $response->assertOk();
    $response->assertViewIs('provider.scholarships.create');
});

test('provider can create scholarship with eligibility criteria', function () {
    $response = $this->actingAs($this->provider)
        ->post(route('provider.scholarships.store'), [
            'title' => 'STEM Scholarship 2024',
            'description' => 'For STEM students',
            'slots' => 20,
            'deadline' => now()->addMonths(3)->toDateString(),
            'eligibility_criteria' => [
                'min_gpa' => '3.5',
                'locations' => 'New York, California, Texas',
                'courses' => 'Computer Science, Engineering, Physics',
                'year_levels' => 'Year 1, Year 2, Year 3',
                'income_brackets' => 'Low, Medium',
            ],
        ]);

    $response->assertRedirect(route('provider.scholarships.index'));
    $response->assertSessionHas('success');

    $scholarship = Scholarship::where('title', 'STEM Scholarship 2024')->first();
    $this->assertNotNull($scholarship);
    $this->assertEquals('open', $scholarship->status);
    $this->assertEquals(20, $scholarship->slots);
    $this->assertIsArray($scholarship->eligibility_criteria);
    $this->assertEquals(3.5, $scholarship->eligibility_criteria['min_gpa']);
    $this->assertContains('Computer Science', $scholarship->eligibility_criteria['courses']);
});

test('provider can view scholarship edit form', function () {
    $scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Edit Test Scholarship',
        'description' => 'Test',
        'slots' => 10,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $response = $this->actingAs($this->provider)
        ->get(route('provider.scholarships.edit', $scholarship));

    $response->assertOk();
    $response->assertViewIs('provider.scholarships.edit');
    $response->assertViewHas('scholarship', $scholarship);
});

test('provider can update scholarship', function () {
    $scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Original Title',
        'description' => 'Original description',
        'slots' => 10,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => ['min_gpa' => 3.0],
    ]);

    $response = $this->actingAs($this->provider)
        ->put(route('provider.scholarships.update', $scholarship), [
            'title' => 'Updated Title',
            'description' => 'Updated description',
            'slots' => 25,
            'deadline' => now()->addMonths(4)->toDateString(),
            'eligibility_criteria' => [
                'min_gpa' => '3.7',
                'locations' => 'New York',
                'courses' => 'Engineering',
                'year_levels' => 'Year 2, Year 3',
                'income_brackets' => 'Low',
            ],
        ]);

    $response->assertRedirect(route('provider.scholarships.index'));
    $response->assertSessionHas('success', 'Scholarship updated successfully.');

    $scholarship->refresh();
    $this->assertEquals('Updated Title', $scholarship->title);
    $this->assertEquals('Updated description', $scholarship->description);
    $this->assertEquals(25, $scholarship->slots);
    $this->assertEquals(3.7, $scholarship->eligibility_criteria['min_gpa']);
});

test('provider can delete scholarship', function () {
    $scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Delete Test',
        'description' => 'Test',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $response = $this->actingAs($this->provider)
        ->delete(route('provider.scholarships.destroy', $scholarship));

    $response->assertRedirect(route('provider.scholarships.index'));
    $response->assertSessionHas('success', 'Scholarship deleted successfully.');

    $this->assertNull(Scholarship::find($scholarship->id));
});

test('provider cannot edit or delete other providers scholarships', function () {
    $scholarship = Scholarship::create([
        'organization_id' => $this->otherProvider->organization->id,
        'title' => 'Other Scholarship',
        'description' => 'Test',
        'slots' => 10,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $editResponse = $this->actingAs($this->provider)
        ->get(route('provider.scholarships.edit', $scholarship));
    $editResponse->assertForbidden();

    $deleteResponse = $this->actingAs($this->provider)
        ->delete(route('provider.scholarships.destroy', $scholarship));
    $deleteResponse->assertForbidden();

    // Verify scholarship still exists
    $this->assertNotNull(Scholarship::find($scholarship->id));
});
