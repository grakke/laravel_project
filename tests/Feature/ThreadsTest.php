<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = \App\Models\Thread::factory()->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);

        $response = $this->get('/threads/'.$thread->id);
        $response->assertSee($thread->title);
    }
}
