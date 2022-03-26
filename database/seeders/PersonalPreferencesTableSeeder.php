<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\PersonalPreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PersonalPreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('personal_preferences')->truncate();

        // for every user that is not an admin, create a personal preference
        $users = User::where('type', '!=', UserType::ADMIN)->get();
        $users->each(function($user){
            PersonalPreference::factory()->make([
                'user_id' => $user->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
