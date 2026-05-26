<?php

it('shows welcome page for unauthenticated users', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertViewIs('welcome');
});
