<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\PlaceListing;
use App\Models\PlaceListingLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceListingLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_listing_locations')->truncate();

        // for every place listing, give it a location
        $listings = PlaceListing::all();
        $cities = City::with('localities')->get();
        
        $listings->each(function($listing) use($cities){
            $city = $cities->random();
            $locality = $city->localities->random();

            PlaceListingLocation::factory()->make([
                'place_listing_id' => $listing->id,
                'city_id' => $city->id,
                'locality_id' => $locality->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
