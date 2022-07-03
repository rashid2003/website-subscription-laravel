<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    //test create new subscriber
    public function test_create_new_subscriber()
    {
        //create a test with name, email, and website_id
        $response = $this->post('/api/subscribers', ['name' => 'Test Name', 'email' => 'Test Email', 'website_id' => 1]);

        $response->assertStatus(201);
    }
}
