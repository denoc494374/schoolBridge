<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (['admin', 'provider', 'student'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

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

        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'role' => 'student',
            'password' => Hash::make('password'),
        ])->assignRole('student');

        $this->call(ScholarshipSeeder::class);
    }
}
