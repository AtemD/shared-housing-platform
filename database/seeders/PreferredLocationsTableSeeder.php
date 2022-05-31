<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\PlacePreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferredLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('preferred_locations')->truncate();

        // for every place , give it a location
        $place_preferences = PlacePreference::all();
        $cities = City::with('localities')->get();

        $place_preferences->each(function ($place_preference) use ($cities) {
            $cities = $cities->random(mt_rand(1, $cities->count()));
            $city_ids = [];
            foreach($cities as $city){
                $random_locality = $city->localities->random();
                $city_ids[$city->id] = ['locality_id' => $random_locality->id];
            }

            $place_preference->preferredLocations()->attach($city_ids);
        });

        // $user->roles()->attach([
        //     'city_id' => ['locality_id' => l_id],
        //     2 => ['expires' => $expires],
        // ]);

        // $user->roles()->attach([
        //     1 => ['expires' => $expires],
        //     2 => ['expires' => $expires],
        // ]);

        // $place_preferences->each(function ($place_preference) use ($cities) {
        //     $city = $cities->random();
        //     $random_localities = $city->localities->random(mt_rand(1, $city->localities->count()));

        //     $locality_ids = [];
        //     foreach($random_localities as $locality){
        //         $locality_ids[$locality->id] = ['city_id' => $city->id];
        //     }

        //     // dd($locality_ids);
        //     $place_preference->preferredLocations()->createMany($locality_ids);
        // });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
