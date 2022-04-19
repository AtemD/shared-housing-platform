<?php

namespace Database\Seeders;

use App\Models\BasicProfile;
use App\Models\Occupation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('occupations')->truncate();

        $basic_profiles = BasicProfile::all();
        
        // For each basic profile generate a couple of occupations
        $basic_profiles->each(function($profile){
            Occupation::factory()->times(mt_rand(1, 2))->create([
                'basic_profile_id' => $profile->id,
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
