<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Locality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('localities')->truncate();

        $cities = City::all();
        
        // For each city generate a couple of localities
        $cities->each(function($city){
            Locality::factory()->times(mt_rand(12, 23))->create([
                'city_id' => $city->id,
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
