<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }

    public function test_create_user_slug_from_first_name_and_last_name()
    {
        // \App\Models\User::factory(10)->create();

        // $user = new User;
        // $user->first_name = 'dan';
        // $user->last_name = 'dan';
        // $user->phone = '0999999';
        // $user->email = 'dan@test.com';
        // $user->password = 'password';
        // $user->type = 1;

        // $user->save();

        $user = $this->createUser();
        // $user = User::first();
        // dd($user->toArray());
        // $article = factory(User::class)->make([
        //     'title' => 'Example Article Title'
        // ]);
        // $slug_name = $user->first_name . '-' . $user->last_name;

        $this->assertEquals('dan-dan', $user->slug);
    }

    public function createUser(){
        return $user = User::factory()->make([
            'first_name' =>  'dan',
            'last_name ' => 'dan',
            'phone' => '09999999',
            'email' => 'a@test.com',
            'password' => 'password',
            'type' => 1,
        ]);
    }
}
