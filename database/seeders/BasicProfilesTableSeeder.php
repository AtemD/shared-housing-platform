<?php

namespace Database\Seeders;

use App\Models\BasicProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\References\ProfileStatus;

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

        // for every user that is not an admin, create a basic profile
        $users = User::all();
        
        $users->each(function($user){
            BasicProfile::factory()->make([
                'user_id' => $user->id,
            ])->save();

            $user->update(['profile_status' => ProfileStatus::COMPLETE]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
