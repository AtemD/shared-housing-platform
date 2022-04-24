<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Place;

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

        // for every place  create at least 1 image
        $places = Place::all();
        $places->each(function($place){
            $place->images()->createMany([
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
                ['name' => time(). '_' . mt_rand(1, 100) . '.' . 'jpg'],
            ]);
        });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
