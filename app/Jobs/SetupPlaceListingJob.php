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

class SetupPlaceListingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $place_listing;
    public $place_listing_location;
    public $place_listing_amenities;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($place_listing_setup_details, $auth_user)
    {
        $this->place_listing = $place_listing_setup_details['place_listings'];
        $this->place_listing_location = $place_listing_setup_details['place_listing_location'];
        $this->place_listing_amenities = $place_listing_setup_details['place_listing_amenities'];
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
            $place_listing = $this->user->placeListings()->create([
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

            // Insert the location
            $place_listing->placeListingLocation()->create([
                'city' => $this->place_listing_location['city'],
                'locality' => $this->place_listing_location['locality'],
                'street' => $this->place_listing_location['street'],
                'specific_information' => $this->place_listing_location['specific_information'],
                'address' => $this->place_listing_location['address'],
                'lat' => $this->place_listing_location['lat'],
                'lng' => $this->place_listing_location['lng'],
            ]);

            // Insert the amenities
            $place_listing->amenities()->attach($this->place_listing_amenities);
        });
    }
}
