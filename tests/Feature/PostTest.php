<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_return_a_list_of_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_post_via_api()
    {
        $postData = [
            'title' => 'New Post',
            'content' => 'Content of the new post.'
        ];

        $response = $this->post('/api/posts', $postData);

        $response->assertStatus(201)
            ->assertJson(['title' => 'New Post']);

        $this->assertDatabaseHas('posts', $postData);
    }
}
