<?php

namespace Database\Seeders;

use App\References\UserType;
use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('places')->truncate();

        // Obtain all users of type lister
        $users = User::where('type', UserType::LISTER)->get();

        $users->each(function($user){
            Place::factory()->make([
                'user_id' => $user->id,
                'featured_image_id' => 1
            ])->save();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
