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
    public $place_listing;
    public $place_listing_preferences;
    public $personal_preferences;
    public $compatibility_preferences;
    public $interests;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($profile_setup_details, $auth_user)
    {
        $this->basic_profile = $profile_setup_details['basic_profile'];

        if (array_key_exists("place_listing", $profile_setup_details)) {
            $this->place_listing = $profile_setup_details['place_listing'];
        } else {
            $this->place_listing = null;
        }


        if (array_key_exists("place_listing_preferences", $profile_setup_details)) {
            $this->place_listing_preferences = $profile_setup_details['place_listing_preferences'];
        } else {
            $this->place_listing_preferences = null;
        }

        $this->personal_preferences = $profile_setup_details['personal_preferences'];
        $this->compatibility_preferences = $profile_setup_details['compatibility_preferences'];
        $this->interests = $profile_setup_details['interests'];

        $this->user = $auth_user;

        
        // dd($this->interests);
        // dd($this->place_listing['rent_amount']);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {

            $this->user->basicProfile()->create([
                'gender' => $this->basic_profile['gender'],
                'dob' => $this->basic_profile['dob'],
                'bio' => $this->basic_profile['bio'],
            ]);

            if($this->place_listing != null) {
                $this->user->placeListings()->create([
                    'rent_amount' => $this->place_listing['rent_amount'],
                    'rent_period' => $this->place_listing['rent_period'],
                    'rent_currency' => $this->place_listing['rent_currency'],
                    'bills_included' => $this->place_listing['bills_included'],
                    'place_type' => $this->place_listing['place_type'],
                    'furnishing_type' => $this->place_listing['furnishing_type'],
                    'min_stay_period' => $this->place_listing['min_stay_period'],
                    'availability_date' => $this->place_listing['availability_date'],
                    'description' => $this->place_listing['description'],
                    // 'featured_image' => $this->place_listing['featured_image']
                ]);


                // process the image, update the place listing with an image id
            }
            

            // Note: a place listing preference has locations too, locations that the user prefers
            if($this->place_listing_preferences != null){
                $this->user->placeListingPreference()->create([
                    'min_rent_amount' => $this->place_listing_preferences['min_rent_amount'],
                    'max_rent_amount' => $this->place_listing_preferences['max_rent_amount'],
                    'rent_period' => $this->place_listing_preferences['rent_period'],
                    'availability_date' => $this->place_listing_preferences['availability_date'],
                ]);
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
