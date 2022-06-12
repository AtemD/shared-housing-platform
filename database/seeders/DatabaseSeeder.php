<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\CompatibilityQuestion;

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

        $this->call(UsersTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(BasicProfilesTableSeeder::class);
        $this->call(PlacePreferencesTableSeeder::class);
        $this->call(PersonalPreferencesTableSeeder::class);
        $this->call(CompatibilityPreferencesTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(UserHasInterestsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        
        $this->call(CompatibilityQuestionsTableSeeder::class);
        $this->call(AnswerChoicesTableSeeder::class);
        $this->call(UserHasCompatibilityQuestionAnswersTableSeeder::class);

        
        $this->call(RegionsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(LocalitiesTableSeeder::class);
        $this->call(PlaceLocationsTableSeeder::class);
        $this->call(UserLocationsTableSeeder::class);

        $this->call(AmenitiesTableSeeder::class);
        $this->call(PlaceHasAmenitiesTableSeeder::class);
        $this->call(OccupationsTableSeeder::class);
        $this->call(SpokenLanguagesTableSeeder::class);
        $this->call(PreferredLocationsTableSeeder::class);
        $this->call(PlaceRequestsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);

        // CompatibilityQuestion::factory()->times(3)->create();
    }
}
