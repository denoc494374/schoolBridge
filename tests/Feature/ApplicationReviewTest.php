<?php

use App\Events\ApplicationStatusUpdated;
use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'Provider Org',
        'address' => '123 Main St',
        'contact_email' => 'provider@org.org',
        'verified_at' => now(),
    ]);

    $this->otherProvider = User::factory()->create();
    $this->otherProvider->assignRole('provider');
    $this->otherProvider->organization()->create([
        'name' => 'Other Org',
        'address' => '456 Oak Ave',
        'contact_email' => 'other@org.org',
        'verified_at' => now(),
    ]);

    $this->student = User::factory()->create();
    $this->student->assignRole('student');

    $this->scholarship = Scholarship::create([
        'organization_id' => $this->provider->organization->id,
        'title' => 'Test Scholarship',
        'description' => 'Test',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $this->application = Application::create([
        'scholarship_id' => $this->scholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'remarks' => 'Test remarks',
        'submitted_at' => now(),
    ]);
});

test('provider can view applications for their scholarships', function () {
    $response = $this->actingAs($this->provider)
        ->get(route('provider.applications.index'));

    $response->assertOk();
    $response->assertViewIs('provider.applications.index');
    $response->assertViewHas('applications');
});

test('provider can view application details', function () {
    $response = $this->actingAs($this->provider)
        ->get(route('provider.applications.show', $this->application));

    $response->assertOk();
    $response->assertViewIs('provider.applications.show');
    $response->assertViewHas('application', $this->application);
});

test('provider cannot view other organizations applications', function () {
    $otherScholarship = Scholarship::create([
        'organization_id' => $this->otherProvider->organization->id,
        'title' => 'Other Scholarship',
        'description' => 'Test',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $otherApplication = Application::create([
        'scholarship_id' => $otherScholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'submitted_at' => now(),
    ]);

    $response = $this->actingAs($this->provider)
        ->get(route('provider.applications.show', $otherApplication));

    $response->assertForbidden();
});

test('provider can update application status from pending to shortlisted', function () {
    $oldStatus = $this->application->status;

    $response = $this->actingAs($this->provider)
        ->put(route('provider.applications.update', $this->application), [
            'status' => 'shortlisted',
        ]);

    $response->assertRedirect(route('provider.applications.show', $this->application));
    $response->assertSessionHas('success');

    $this->application->refresh();
    $this->assertEquals('shortlisted', $this->application->status);

    // Verify event was dispatched
    Event::assertDispatched(ApplicationStatusUpdated::class, function ($event) use ($oldStatus) {
        return $event->application->id === $this->application->id &&
               $event->oldStatus === $oldStatus;
    });
});

test('provider can update application status from pending to rejected', function () {
    $response = $this->actingAs($this->provider)
        ->put(route('provider.applications.update', $this->application), [
            'status' => 'rejected',
        ]);

    $response->assertRedirect(route('provider.applications.show', $this->application));
    $response->assertSessionHas('success');

    $this->application->refresh();
    $this->assertEquals('rejected', $this->application->status);

    Event::assertDispatched(ApplicationStatusUpdated::class);
});

test('provider can update application status from shortlisted to approved', function () {
    $this->application->update(['status' => 'shortlisted']);

    $response = $this->actingAs($this->provider)
        ->put(route('provider.applications.update', $this->application), [
            'status' => 'approved',
        ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->application->refresh();
    $this->assertEquals('approved', $this->application->status);

    Event::assertDispatched(ApplicationStatusUpdated::class);
});

test('provider cannot update applications from other organizations', function () {
    $otherScholarship = Scholarship::create([
        'organization_id' => $this->otherProvider->organization->id,
        'title' => 'Other Scholarship',
        'description' => 'Test',
        'slots' => 5,
        'deadline' => now()->addMonth(),
        'status' => 'open',
        'eligibility_criteria' => [],
    ]);

    $otherApplication = Application::create([
        'scholarship_id' => $otherScholarship->id,
        'student_id' => $this->student->id,
        'status' => 'pending',
        'submitted_at' => now(),
    ]);

    $response = $this->actingAs($this->provider)
        ->put(route('provider.applications.update', $otherApplication), [
            'status' => 'shortlisted',
        ]);

    $response->assertForbidden();

    $otherApplication->refresh();
    $this->assertEquals('pending', $otherApplication->status);
});
