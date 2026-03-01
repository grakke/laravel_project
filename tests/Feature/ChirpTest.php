<?php

use App\Models\Chirp;
use App\Models\User;

test('chirps index requires authentication', function () {
    $response = $this->get(route('chirps.index'));

    $response->assertRedirect(route('login'));
});

test('authenticated user can view chirps index', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('chirps.index'));

    $response->assertOk();
});

test('chirps are displayed on index page', function () {
    $user = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $user->id, 'message' => 'Hello World']);

    $response = $this->actingAs($user)->get(route('chirps.index'));

    $response->assertOk();
    $response->assertSee('Hello World');
});

test('authenticated user can store a chirp', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('chirps.store'), [
        'message' => 'My first chirp!',
    ]);

    $response->assertRedirect(route('chirps.index'));
    $this->assertDatabaseHas('chirps', [
        'user_id' => $user->id,
        'message' => 'My first chirp!',
    ]);
});

test('chirp message is required', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('chirps.store'), [
        'message' => '',
    ]);

    $response->assertSessionHasErrors('message');
});

test('chirp message cannot exceed 255 characters', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('chirps.store'), [
        'message' => str_repeat('a', 256),
    ]);

    $response->assertSessionHasErrors('message');
});

test('unauthenticated user cannot store a chirp', function () {
    $response = $this->post(route('chirps.store'), [
        'message' => 'Should not work',
    ]);

    $response->assertRedirect(route('login'));
    $this->assertDatabaseCount('chirps', 0);
});

test('chirp owner can edit their chirp', function () {
    $user = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get(route('chirps.edit', $chirp));

    $response->assertOk();
});

test('user cannot edit another users chirp', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $owner->id]);

    $response = $this->actingAs($other)->get(route('chirps.edit', $chirp));

    $response->assertForbidden();
});

test('chirp owner can update their chirp', function () {
    $user = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->put(route('chirps.update', $chirp), [
        'message' => 'Updated message',
    ]);

    $response->assertRedirect(route('chirps.index'));
    $this->assertDatabaseHas('chirps', [
        'id' => $chirp->id,
        'message' => 'Updated message',
    ]);
});

test('user cannot update another users chirp', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $owner->id]);

    $response = $this->actingAs($other)->put(route('chirps.update', $chirp), [
        'message' => 'Hacked!',
    ]);

    $response->assertForbidden();
});

test('chirp owner can delete their chirp', function () {
    $user = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->delete(route('chirps.destroy', $chirp));

    $response->assertRedirect(route('chirps.index'));
    $this->assertDatabaseMissing('chirps', ['id' => $chirp->id]);
});

test('user cannot delete another users chirp', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $chirp = Chirp::factory()->create(['user_id' => $owner->id]);

    $response = $this->actingAs($other)->delete(route('chirps.destroy', $chirp));

    $response->assertForbidden();
    $this->assertDatabaseHas('chirps', ['id' => $chirp->id]);
});
