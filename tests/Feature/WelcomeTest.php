<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_visit_welcome_page()
    {
        $response = $this->get('/');

        $response->assertSee('SHUMA');

        $response->assertStatus(200);
    }
}
