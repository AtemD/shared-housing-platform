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

        // Amenity::factory()->times(15)->create();

        Amenity::factory()->create([
            'name' => 'bed'
        ]);

        Amenity::factory()->create([
            'name' => 'shower'
        ]);

        Amenity::factory()->create([
            'name' => 'cardboad'
        ]);

        Amenity::factory()->create([
            'name' => 'bathtab'
        ]);

        Amenity::factory()->create([
            'name' => 'sink'
        ]);

        Amenity::factory()->create([
            'name' => 'table'
        ]);

        Amenity::factory()->create([
            'name' => 'chair'
        ]);

        Amenity::factory()->create([
            'name' => 'wifi'
        ]);

        Amenity::factory()->create([
            'name' => 'Television'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
