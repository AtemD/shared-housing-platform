<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->call(UsersTableSeeder::class);
        // $this->call(PlaceListingsTableSeeder::class);
        // $this->call(BasicProfilesTableSeeder::class);
        // $this->call(PlaceListingPreferencesTableSeeder::class);
        // $this->call(PersonalPreferencesTableSeeder::class);
        // $this->call(CompatibilityPreferencesTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        // $this->call(UserHasInterestsTableSeeder::class);
        // $this->call(ImagesTableSeeder::class);
    }
}
