<?php

use App\Models\Thread;
use App\Models\User;

test('a user can browse threads', function () {
    $thread = Thread::factory()->create();

    $response = $this->get('/threads');

    $response->assertOk();
    $response->assertSee($thread->title);
});

test('threads are displayed in latest order', function () {
    $thread1 = Thread::factory()->create(['title' => 'First Thread']);
    $thread2 = Thread::factory()->create(['title' => 'Second Thread']);

    $response = $this->get('/threads');

    $response->assertOk();
    $response->assertSeeInOrder(['Second Thread', 'First Thread']);
});
