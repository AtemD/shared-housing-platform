<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\User;
use App\Models\PlaceListing;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('images')->truncate();

        // for every user create at least 1 image
        $users = User::all();
        $users->each(function($user){
            $user->images()->createMany([
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
            ]);
        });

        // for every place listing create at least 1 image
        $place_listings = PlaceListing::all();
        $place_listings->each(function($place_listing){
            $place_listing->images()->createMany([
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
            ]);
        });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
