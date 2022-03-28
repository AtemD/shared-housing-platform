<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\PlaceListing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PlaceListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_listings')->truncate();

        // Obtain all users of type lister
        $users = User::where('type', '=', UserType::LISTER)->get();

        $users->each(function($user){
            PlaceListing::factory()->make([
                'user_id' => $user->id,
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
