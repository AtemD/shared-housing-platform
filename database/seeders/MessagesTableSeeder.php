<?php

namespace Database\Seeders;

use App\Models\BasicProfile;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\References\ProfileStatus;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('messages')->truncate();

        
        // for every user that is not an admin, create a basic profile
        $users = User::all();
        
        $users->each(function($user) use($users){
            // send a message to 3 or more users
            $random_receivers = $users->random(mt_rand(3, 18));

            $random_receivers->each(function($receiver) use($user) {
                if($receiver->id != $user->id){
                    Message::factory()->make([
                        'sender_id' => $user->id,
                        'receiver_id' => $receiver->id,
                    ])->save();
                }  
            });
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
