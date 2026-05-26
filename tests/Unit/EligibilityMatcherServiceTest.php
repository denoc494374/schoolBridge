<?php

namespace Tests\Unit;

use App\Models\Scholarship;
use App\Models\Organization;
use App\Models\StudentProfile;
use App\Models\User;
use App\Services\EligibilityMatcherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EligibilityMatcherServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_matches_returns_true_when_profile_meets_criteria(): void
    {
        $user = User::factory()->create();
        $profile = StudentProfile::create([
            'user_id' => $user->id,
            'gpa' => 3.8,
            'course' => 'Engineering',
            'year_level' => 'Third Year',
            'address' => 'Metro City',
        ]);

        $organizationUser = User::factory()->create();
        $organization = Organization::create([
            'user_id' => $organizationUser->id,
            'name' => 'Education Org',
            'address' => '123 Main Street',
            'contact_email' => 'info@example.org',
        ]);

        $scholarship = Scholarship::create([
            'organization_id' => $organization->id,
            'title' => 'STEM Support',
            'description' => 'Funding for engineering students',
            'slots' => 2,
            'eligibility_criteria' => [
                'min_gpa' => 3.5,
                'courses' => ['Engineering'],
                'locations' => ['Metro City'],
                'year_levels' => ['Third Year'],
            ],
            'deadline' => now()->addDays(10),
            'status' => 'open',
        ]);

        $this->assertTrue((new EligibilityMatcherService())->matches($profile, $scholarship));
    }

    public function test_matches_returns_false_when_profile_fails_criteria(): void
    {
        $user = User::factory()->create();
        $profile = StudentProfile::create([
            'user_id' => $user->id,
            'gpa' => 2.8,
            'course' => 'Business',
            'year_level' => 'First Year',
            'address' => 'Rural Town',
        ]);

        $organizationUser = User::factory()->create();
        $organization = Organization::create([
            'user_id' => $organizationUser->id,
            'name' => 'Education Org',
            'address' => '123 Main Street',
            'contact_email' => 'info@example.org',
        ]);

        $scholarship = Scholarship::create([
            'organization_id' => $organization->id,
            'title' => 'STEM Support',
            'description' => 'Funding for engineering students',
            'slots' => 2,
            'eligibility_criteria' => [
                'min_gpa' => 3.5,
                'courses' => ['Engineering'],
                'locations' => ['Metro City'],
            ],
            'deadline' => now()->addDays(10),
            'status' => 'open',
        ]);

        $this->assertFalse((new EligibilityMatcherService())->matches($profile, $scholarship));
    }
}
