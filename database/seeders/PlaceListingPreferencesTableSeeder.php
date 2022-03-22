<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\PlaceListingPreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PlaceListingPreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_listing_preferences')->truncate();

        // for every user that is not an admin, create a place listing preference
        $users = User::where('type', '!=', UserType::ADMIN)->get();
        $users->each(function($user){
            PlaceListingPreference::factory()->make([
                'user_id' => $user->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
