<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_post()
    {
        $post = Post::factory()->create([
            'title' => 'Test Post',
            'content' => 'This is a test post.'
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'content' => 'This is a test post.'
        ]);
    }
}
