<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        // Create test organization if it doesn't exist
        $org = Organization::firstOrCreate(
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

        // Create test scholarships with future deadlines
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
    }
}
