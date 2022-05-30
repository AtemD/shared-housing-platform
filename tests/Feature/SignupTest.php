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

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');
 
        $response->assertStatus(200);
    }

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

        $user = User::factory()->times(1)->make()->first();
        // // // dd($user->toArray()[0]);
        // // $user_array = $user->toArray()[0];

        $response = $this->post('/register', [
            'type' => $user->getAttributes()['type'],
            'first_name' => $user->getAttributes()['first_name'],
            'last_name' => $user->getAttributes()['last_name'],
            'email' => $user->getAttributes()['email'],
            'phone' => '0911111111',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // // $user = User::first()->get();
        // $user = User::firstOrFail();
        // // dd($user->toArray());


        // $this->assertFalse($user->confirmed);
        // $this->assertNotNull($user->confirmation_token);

        // $this->get(route('register.confirm', ['token' => $user->confirmation_token]))
        //     ->assertRedirect(route(RouteServiceProvider::HOME_USER));

        // $user = User::factory()->times(1)->make();
        // // dd($user->toArray()[0]);
        //     $response = $this->post('/register', [
        //         'type' => 2,
        //         'first_name' => 'User First',
        //         'last_name' => 'User Last',
        //         'email' => 'test@example.com',
        //         'phone' => '0911111111',
        //         'password' => 'password',
        //         'password_confirmation' => 'password',
        //     ]);
    //  dd($response->user);
            // $this->assertFalse($response->confirmed);
        // $this->assertNotNull($user->confirmation_token);
            // $this->assertAuthenticated();
            if( $user->getAttributes()['type'] == 1){
                $response->assertRedirect('/');
            }

            if( $user->getAttributes()['type'] == 2){
                $response->assertRedirect('/');;
            }
    }
}
