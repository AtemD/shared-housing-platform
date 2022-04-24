<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceHasAmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_has_amenities')->truncate();

        $places = Place::all();
        $amenities = Amenity::all();
        $amenities_count = $amenities->count();

        $places->each(function($place) use($amenities, $amenities_count){
            $place->amenities()->attach($amenities->random(mt_rand(1, $amenities_count)));
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
