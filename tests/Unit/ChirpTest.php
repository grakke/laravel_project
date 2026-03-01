<?php

use App\Models\Chirp;
use App\Models\User;

test('chirp belongs to a user', function () {
    $chirp = Chirp::factory()->create();

    expect($chirp->user)->toBeInstanceOf(User::class);
});

test('chirp has fillable message', function () {
    $chirp = new Chirp();

    expect($chirp->getFillable())->toBe(['message']);
});

test('user has many chirps', function () {
    $user = User::factory()->create();
    Chirp::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->chirps)->toHaveCount(3);
    expect($user->chirps->first())->toBeInstanceOf(Chirp::class);
});

test('chirp dispatches ChirpCreated event on creation', function () {
    $chirp = new Chirp();

    expect($chirp->getDispatchesEvents())->toHaveKey('created')
        ->and($chirp->getDispatchesEvents()['created'])->toBe(\App\Events\ChirpCreated::class);
});
