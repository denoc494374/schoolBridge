<?php

namespace App\Services;

use App\Models\Scholarship;
use App\Models\StudentProfile;

class EligibilityMatcherService
{
    public function matches(StudentProfile|null $profile, Scholarship $scholarship): bool
    {
        if (! $profile) {
            return false;
        }

        $criteria = $scholarship->eligibility_criteria ?? [];

        return $this->matchesMinGpa($profile, $criteria)
            && $this->matchesAddresses($profile, $criteria)
            && $this->matchesCourses($profile, $criteria)
            && $this->matchesYearLevels($profile, $criteria);
    }

    protected function matchesMinGpa(StudentProfile $profile, array $criteria): bool
    {
        if (! isset($criteria['min_gpa']) || $criteria['min_gpa'] === null || $criteria['min_gpa'] === '') {
            return true;
        }

        return $profile->gpa !== null && $profile->gpa >= $criteria['min_gpa'];
    }

    protected function matchesAddresses(StudentProfile $profile, array $criteria): bool
    {
        return $this->matchesArrayCriteria($profile->address, $criteria['locations'] ?? []);
    }

    protected function matchesCourses(StudentProfile $profile, array $criteria): bool
    {
        return $this->matchesArrayCriteria($profile->course, $criteria['courses'] ?? []);
    }

    protected function matchesYearLevels(StudentProfile $profile, array $criteria): bool
    {
        return $this->matchesArrayCriteria($profile->year_level, $criteria['year_levels'] ?? []);
    }

    protected function matchesArrayCriteria(string|null $value, array $allowed): bool
    {
        if (empty($allowed)) {
            return true;
        }

        if ($value === null || $value === '') {
            return false;
        }

        return in_array(strtolower($value), array_map('strtolower', $allowed), true);
    }
}
