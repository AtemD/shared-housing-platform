<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('amenities')->truncate();

        Amenity::factory()->times(15)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
