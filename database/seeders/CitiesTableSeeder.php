<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();

        $regions = Region::all();
        
        // For each region generate a couple of cities
        $regions->each(function($region){
            City::factory()->times(1)->create([
                'name' => 'Addis Ababa',
                'region_id' => $region->id,
            ]);

            City::factory()->times(1)->create([
                'name' => 'Hawassa',
                'region_id' => $region->id,
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
