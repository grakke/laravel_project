<?php

use App\Models\User;

test('homepage returns successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('dashboard requires authentication', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect(route('login'));
});

test('authenticated verified user can access dashboard', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
});

test('welcome view route works', function () {
    $response = $this->get('/welcome');

    $response->assertOk();
});

test('permanent redirect works', function () {
    $response = $this->get('/redirect');

    $response->assertRedirect('/user');
    $response->assertStatus(301);
});
