<?php

namespace Database\Seeders;

use App\Models\BasicProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\User;

class BasicProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('basic_profiles')->truncate();

        // for every user generated, create a basic profile
        BasicProfile::factory()->times(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
