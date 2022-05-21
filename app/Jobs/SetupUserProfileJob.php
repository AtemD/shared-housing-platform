<?php

namespace App\Jobs;

use App\Models\BasicProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetupUserProfileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $basic_profile;
    public $occupations;
    public $spoken_languages;
    public $place;
    public $place_preferences;
    public $place_preference_preferred_locations;
    public $personal_preferences;
    public $compatibility_preferences;
    public $interests;
    public $user_locations;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($profile_setup_details, $auth_user)
    {
        $this->basic_profile = $profile_setup_details['basic_profile'];
        $this->user_locations = $profile_setup_details['user_locations'];

        // process occupations
        foreach($profile_setup_details['occupations'] as $occupation){
            $this->occupations[] = ['name' => $occupation];
        }
        $this->occupations[] = ['name' => 'doctor'];

        foreach($profile_setup_details['spoken_languages'] as $language){
            $this->spoken_languages[] = ['name' => $language];
        }

        if (array_key_exists("place", $profile_setup_details)) {
            $this->place = $profile_setup_details['place'];
        } else {
            $this->place = null;
        }


        if (array_key_exists("place_preferences", $profile_setup_details)) {
            $this->place_preferences = $profile_setup_details['place_preferences'];
            $this->place_preference_preferred_locations = $profile_setup_details['place_preference_preferred_locations']; // contains the chosen city and localities
        } else {
            $this->place_preferences = null;
            $this->place_preference_preferred_locations = null;
        }

        $this->personal_preferences = $profile_setup_details['personal_preferences'];
        $this->compatibility_preferences = $profile_setup_details['compatibility_preferences'];
        $this->interests = $profile_setup_details['interests'];

        $this->user = $auth_user;

        
        // dd($this->interests);
        // dd($this->place['rent_amount']);
        // dd($this->occupations);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {

            $basic_profile = $this->user->basicProfile()->create([
                'gender' => $this->basic_profile['gender'],
                'dob' => $this->basic_profile['dob'],
                'bio' => $this->basic_profile['bio'],
            ]);

            $this->user->userLocation()->create([
                'city_id' => $this->user_locations['city_id'],
                'locality_id' => $this->user_locations['locality_id'],
            ]);

            $basic_profile->occupations()->createMany($this->occupations);

            $basic_profile->spokenLanguages()->createMany($this->spoken_languages);

            if($this->place != null) {
                $this->user->places()->create([
                    'rent_amount' => $this->place['rent_amount'],
                    'rent_period' => $this->place['rent_period'],
                    'rent_currency' => $this->place['rent_currency'],
                    'bills_included' => $this->place['bills_included'],
                    'place_type' => $this->place['place_type'],
                    'furnishing_type' => $this->place['furnishing_type'],
                    'min_stay_period' => $this->place['min_stay_period'],
                    'availability_date' => $this->place['availability_date'],
                    'description' => $this->place['description'],
                    // 'featured_image' => $this->place['featured_image']
                ]);


                // process the image, update the place  with an image id
            }       

            // Note: a place  preference has locations too, locations that the user prefers
            if($this->place_preferences != null){
                $place_preference = $this->user->placePreference()->create([
                    'min_rent_amount' => $this->place_preferences['min_rent_amount'],
                    'max_rent_amount' => $this->place_preferences['max_rent_amount'],
                    'rent_period' => $this->place_preferences['rent_period'],
                    'availability_date' => $this->place_preferences['availability_date'],
                ]);
                // $place_preference->

                // $user->roles()->attach([
                //     1 => ['expires' => $expires],
                //     2 => ['expires' => $expires],
                // ]);

                $preferred_locations = [];
                $city_id = $this->place_preference_preferred_locations['city'];

                foreach($this->place_preference_preferred_locations['localities'] as $locality){
                    $preferred_locations[$locality] = ['city_id' => $city_id];
                }

                $place_preference->preferredLocations()->attach($preferred_locations);
            }
            

            $this->user->personalPreference()->create([
                'diet_habit' => $this->personal_preferences['diet_habit'],
                'smoking_habit' => $this->personal_preferences['smoking_habit'],
                'alcohol_habit' => $this->personal_preferences['alcohol_habit'],
                'partying_habit' => $this->personal_preferences['partying_habit'],
                'guest_habit' => $this->personal_preferences['guest_habit'],
                'occupation_type' => $this->personal_preferences['occupation_type'],
                'marital_status' => $this->personal_preferences['marital_status'],
            ]);

            $this->user->compatibilityPreference()->create([
                'diet_habit' => $this->compatibility_preferences['diet_habit'],
                'smoking_habit' => $this->compatibility_preferences['smoking_habit'],
                'alcohol_habit' => $this->compatibility_preferences['alcohol_habit'],
                'partying_habit' => $this->compatibility_preferences['partying_habit'],
                'guest_habit' => $this->compatibility_preferences['guest_habit'],
                'occupation_type' => $this->compatibility_preferences['occupation_type'],
                'marital_status' => $this->compatibility_preferences['marital_status'],
            ]);

            
            $this->user->interests()->attach($this->interests);
            
        });
    }
}
