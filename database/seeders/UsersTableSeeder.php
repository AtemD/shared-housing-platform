<?php

namespace Database\Seeders;

use App\Models\User;
use App\Classes\UserType;
use App\Classes\UserAccountStatus;
use App\Classes\UserVerificationStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        User::factory()->times(200)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'verification_status' => UserVerificationStatus::VERIFIED,
            'account_status' => UserAccountStatus::ACTIVATED, 
            'user_type' => UserType::ADMIN
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
