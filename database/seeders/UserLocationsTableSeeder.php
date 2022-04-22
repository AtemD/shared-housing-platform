<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_locations')->truncate();

        // for every user, give a location
        $users = User::all();
        $cities = City::with('localities')->get();
        
        $users->each(function($user) use($cities){
            $city = $cities->random();
            $locality = $city->localities->random();

            UserLocation::factory()->make([
                'user_id' => $user->id,
                'city_id' => $city->id,
                'locality_id' => $locality->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
