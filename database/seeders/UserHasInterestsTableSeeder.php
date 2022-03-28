<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasInterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_has_interests')->truncate();

        $users = User::all();
        $interests = Interest::all();
        $interests_count = $interests->count();

        $users->each(function($user) use($interests, $interests_count){
            $user->interests()->attach($interests->random(mt_rand(1, $interests_count)));
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
