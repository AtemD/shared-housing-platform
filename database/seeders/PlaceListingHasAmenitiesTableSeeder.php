<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\PlaceListing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceListingHasAmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_listing_has_amenities')->truncate();

        $place_listings = PlaceListing::all();
        $amenities = Amenity::all();
        $amenities_count = $amenities->count();

        $place_listings->each(function($listing) use($amenities, $amenities_count){
            $listing->amenities()->attach($amenities->random(mt_rand(1, $amenities_count)));
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
