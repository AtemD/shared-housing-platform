<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class SignupTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing whether a new user can signup.
     *
     * @return void
     */
    public function test_a_new_user_can_signup()
    {
        // $response = $this->get('/register');

        // $response->assertStatus(200);

        // Country::factory()->times(1)->create();

        $user = User::factory()->times(1)->make();
        // dd($user->toArray()[0]);

        $this->post('/register', $user->toArray()[0]);

        // $user = User::first()->get();
        $user = User::g();
        dd($user->toArray());


        $this->assertFalse($user->confirmed);
        $this->assertNotNull($user->confirmation_token);

        $this->get(route('register.confirm', ['token' => $user->confirmation_token]))
            ->assertRedirect(route(RouteServiceProvider::HOME_USER));
    }
}
