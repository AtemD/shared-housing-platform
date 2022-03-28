<?php

namespace Database\Seeders;

use App\Models\User;
use App\References\UserType;
use App\References\UserAccountStatus;
use App\References\UserVerificationStatus;
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

        User::factory()->times(10)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'verification_status' => UserVerificationStatus::VERIFIED,
            'account_status' => UserAccountStatus::ACTIVATED, 
            'type' => UserType::ADMIN,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
