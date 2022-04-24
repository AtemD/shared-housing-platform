<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\PlacePreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PlacePreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_preferences')->truncate();

        // for every user that is a Searcher, insert a place  preference
        $users = User::where('type', UserType::SEARCHER)->get();
        $users->each(function($user){
            PlacePreference::factory()->make([
                'user_id' => $user->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
