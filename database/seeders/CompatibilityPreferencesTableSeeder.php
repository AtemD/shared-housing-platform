<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\CompatibilityPreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CompatibilityPreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('compatibility_preferences')->truncate();

        // for every user that is not an admin, create a compatibility preference
        $users = User::where('type', '!=', UserType::ADMIN)->get();
        $users->each(function($user){
            CompatibilityPreference::factory()->make([
                'user_id' => $user->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
