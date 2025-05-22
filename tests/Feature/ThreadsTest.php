<?php

namespace Tests\Feature;

use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function a_user_can_browse_threads()
    {
        $thread = Thread::factory()->create();
        $response = $this->get('/threads');

        $response->assertSee($thread->title);

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }
}
