<?php

use App\Models\User;

test('user can register as student', function () {
    $response = $this->post(route('register'), [
        'name' => 'John Student',
        'email' => 'john@student.test',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'role' => 'student',
    ]);

    // User is logged in after registration
    $response->assertRedirect();
    
    $this->assertDatabaseHas('users', [
        'name' => 'John Student',
        'email' => 'john@student.test',
    ]);

    $user = User::where('email', 'john@student.test')->first();
    $this->assertTrue($user->hasRole('student'));
});

test('user can login with correct credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@test.test',
        'password' => bcrypt('password123'),
    ]);
    $user->assignRole('student');

    $response = $this->post(route('login'), [
        'email' => 'test@test.test',
        'password' => 'password123',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($user);
});

test('user cannot login with incorrect password', function () {
    User::factory()->create([
        'email' => 'test@test.test',
        'password' => bcrypt('correct-password'),
    ]);

    $response = $this->post(route('login'), [
        'email' => 'test@test.test',
        'password' => 'wrong-password',
    ]);

    $response->assertInvalid();
    $this->assertGuest();
});

test('student is redirected to dashboard after login', function () {
    $student = User::factory()->create();
    $student->assignRole('student');

    $response = $this->post(route('login'), [
        'email' => $student->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('dashboard'));
});

test('provider is redirected to dashboard after login', function () {
    $provider = User::factory()->create();
    $provider->assignRole('provider');
    $provider->organization()->create([
        'name' => 'Provider Org',
        'address' => '123 Main St',
        'contact_email' => 'provider@org.org',
    ]);

    $response = $this->post(route('login'), [
        'email' => $provider->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('dashboard'));
});

test('admin is redirected to dashboard after login', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $response = $this->post(route('login'), [
        'email' => $admin->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('dashboard'));
});

test('unauthenticated user cannot access protected routes', function () {
    $response = $this->get(route('student.scholarships.index'));

    $response->assertRedirect(route('login'));
});

test('unauthenticated user is redirected to login on dashboard access', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});

test('student cannot access provider routes', function () {
    $student = User::factory()->create();
    $student->assignRole('student');

    $response = $this->actingAs($student)
        ->get(route('provider.scholarships.index'));

    $response->assertForbidden();
});

test('provider cannot access admin routes', function () {
    $provider = User::factory()->create();
    $provider->assignRole('provider');
    $provider->organization()->create([
        'name' => 'Test Org',
        'address' => '123 Test St',
        'contact_email' => 'test@org.org',
    ]);

    $response = $this->actingAs($provider)
        ->get(route('admin.providers.index'));

    $response->assertForbidden();
});

test('student cannot access admin routes', function () {
    $student = User::factory()->create();
    $student->assignRole('student');

    $response = $this->actingAs($student)
        ->get(route('admin.dashboard'));

    $response->assertForbidden();
});

test('guest user sees welcome page at root', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertViewIs('welcome');
});

test('authenticated user accessing root gets redirected to dashboard', function () {
    $user = User::factory()->create();
    $user->assignRole('student');

    $response = $this->actingAs($user)->get('/');

    $response->assertRedirect(route('dashboard'));
});
