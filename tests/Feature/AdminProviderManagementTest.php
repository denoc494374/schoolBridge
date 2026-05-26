<?php

use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');

    $this->provider = User::factory()->create();
    $this->provider->assignRole('provider');
    $this->provider->organization()->create([
        'name' => 'Tech Academy',
        'address' => '123 Tech St',
        'contact_email' => 'academy@tech.org',
        'verified_at' => null,
    ]);

    $this->verifiedProvider = User::factory()->create();
    $this->verifiedProvider->assignRole('provider');
    $this->verifiedProvider->organization()->create([
        'name' => 'Verified Foundation',
        'address' => '456 Main Ave',
        'contact_email' => 'verified@foundation.org',
        'verified_at' => now(),
    ]);
});

test('admin can view providers list', function () {
    $response = $this->actingAs($this->admin)
        ->get(route('admin.providers.index'));

    $response->assertOk();
    $response->assertViewIs('admin.providers.index');
    $response->assertViewHas('organizations');
});

test('admin can view provider details', function () {
    $response = $this->actingAs($this->admin)
        ->get(route('admin.providers.show', $this->provider->organization));

    $response->assertOk();
    $response->assertViewIs('admin.providers.show');
    $response->assertViewHas('organization', $this->provider->organization);
});

test('admin can verify unverified provider', function () {
    $this->assertNull($this->provider->organization->verified_at);

    $response = $this->actingAs($this->admin)
        ->post(route('admin.providers.verify', $this->provider->organization));

    $response->assertRedirect(route('admin.providers.show', $this->provider->organization));
    $response->assertSessionHas('success');

    $this->provider->organization->refresh();
    $this->assertNotNull($this->provider->organization->verified_at);
});

test('admin can revoke verified provider', function () {
    $this->assertNotNull($this->verifiedProvider->organization->verified_at);

    $response = $this->actingAs($this->admin)
        ->post(route('admin.providers.revoke', $this->verifiedProvider->organization));

    $response->assertRedirect(route('admin.providers.show', $this->verifiedProvider->organization));
    $response->assertSessionHas('success');

    $this->verifiedProvider->organization->refresh();
    $this->assertNull($this->verifiedProvider->organization->verified_at);
});

test('student cannot access admin provider management routes', function () {
    $student = User::factory()->create();
    $student->assignRole('student');

    $response = $this->actingAs($student)
        ->get(route('admin.providers.index'));

    $response->assertForbidden();
});

test('provider cannot access admin provider management routes', function () {
    $response = $this->actingAs($this->provider)
        ->get(route('admin.providers.index'));

    $response->assertForbidden();
});

test('unauthenticated user cannot access admin routes', function () {
    $response = $this->get(route('admin.providers.index'));

    $response->assertRedirect(route('login'));
});
