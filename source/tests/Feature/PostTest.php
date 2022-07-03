<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_create_new_post()
    {
        //create a test with title, body, and user_id
        $response = $this->post('/api/posts', ['title' => 'Test Title', 'body' => 'Test Body', 'user_id' => 1]);
 
        $response->assertStatus(201);
    }
}

