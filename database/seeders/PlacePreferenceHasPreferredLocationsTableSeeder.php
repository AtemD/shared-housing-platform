<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\PlacePreference;
use App\Models\PlacePreferenceLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacePreferenceHasPreferredLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_preference_has_preferred_locations')->truncate();

        // for every place , give it a location
        $place_preferences = PlacePreference::all();
        $cities = City::with('localities')->get();
        
        $place_preferences->each(function($place_preference) use($cities){
            $city = $cities->random();
            $locality = $city->localities->random();

            PlacePreferenceLocation::factory()->make([
                'place_preference_id' => $place_preference->id,
                'city_id' => $city->id,
                'locality_id' => $locality->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
