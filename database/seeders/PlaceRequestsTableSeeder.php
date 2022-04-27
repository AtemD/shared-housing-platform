<?php

namespace Database\Seeders;

use App\Models\User;
use App\References\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('place_requests')->truncate();

        // Get all the users that are not admins
        $users = User::where('type', '!=', UserType::ADMIN)->get();
        $listers = User::where('type', UserType::LISTER)->with('places')->get();
        $searchers = User::where('type', UserType::SEARCHER)->get();
        $listers_count = $listers->count();
        $searchers_count = $searchers->count();

        // For each user send requests to a specific number of users
        $users->each(function ($user) use ($listers, $listers_count, $searchers, $searchers_count) {

            // determine the user_type
            // if the user is of type searcher
            // get all the users that are of type listers with their places
            // user sends request to a random number of listers, choosing a random listers place
            // ...
            // if the user if of type lister
            // get all the users that are of type searcher
            // send request to each of the searchers, assigning a random place to the searcher

            if ($user->type == UserType::SEARCHER) {
                $random_listers = $listers->random(mt_rand(1, $listers_count));
                $requests = [];
                foreach ($random_listers as $lister) {
                    if ($lister->places->count() > 0) {
                        $random_place_id = $lister->places->random()->id;
                        $requests[$lister->id] = ['place_id' => $random_place_id];
                    }
                }
                $user->placeRequests()->attach($requests);
            }

            if ($user->type == UserType::LISTER) {
                $random_searchers = $searchers->random(mt_rand(1, $searchers_count));
                $lister = $listers->where('id', $user->id)->first();
                $requests = [];

                if ($lister->places->count() > 0) {
                    foreach ($random_searchers as $searcher) {
                        $requests[$searcher->id] = ['place_id' => $lister->places->random()->first()->id];
                    }
                }
                $user->placeRequests()->attach($requests);
            }
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
