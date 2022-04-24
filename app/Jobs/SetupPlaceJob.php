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

class SetupPlaceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $place;
    public $place_location;
    public $place_amenities;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($place_setup_details, $auth_user)
    {
        $this->place = $place_setup_details['places'];
        $this->place_location = $place_setup_details['place_location'];
        $this->place_amenities = $place_setup_details['place_amenities'];
        $this->user = $auth_user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {
            $place = $this->user->places()->create([
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

            // Insert the location
            $place->placeLocation()->create([
                'city' => $this->place_location['city'],
                'locality' => $this->place_location['locality'],
                'street' => $this->place_location['street'],
                'specific_information' => $this->place_location['specific_information'],
                'address' => $this->place_location['address'],
                'lat' => $this->place_location['lat'],
                'lng' => $this->place_location['lng'],
            ]);

            // Insert the amenities
            $place->amenities()->attach($this->place_amenities);
        });
    }
}
