<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Place;
use App\Models\PlaceLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_locations')->truncate();

        // for every place, give it a location
        $places = Place::all();
        $cities = City::with('localities')->get();
        
        $places->each(function($place) use($cities){
            $city = $cities->random();
            $locality = $city->localities->random();

            PlaceLocation::factory()->make([
                'place_id' => $place->id,
                'city_id' => $city->id,
                'locality_id' => $locality->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
