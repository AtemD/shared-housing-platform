<?php

namespace App\Helpers;

use App\Jobs\SetupPlaceListingJob;
use Illuminate\Support\Facades\Auth;

class PLaceListingSetup
{
    // profile setup steps
    const STEP_START        = "start";
    const STEP_1            = "place_listing";
    const STEP_2            = "place_listing_location";
    const STEP_3            = "amenities";
    const STEP_LAST         = "last";

    /**
     * determine next step
     * 
     * @return array
     */
    public static function determineNextStep($current_step = self::STEP_START)
    {
        if ($current_step == self::STEP_START) {
            $next_step_url = route('user.place-listing-setup.place-listings.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_1) {
            $next_step_url = route('user.place-listing-setup.place-listing-locations.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_2) {
            $next_step_url = route('user.place-listing-setup.place-listing-amenities.create');
            return $next_step_url;
        }

        // The final step 
        if ($current_step == self::STEP_LAST) {
            // First determine that all steps form data is in the session
            if (!self::isPlaceListingSetupInfoComplete()) {
                dd(session('place_listing_setup'));
                session()->flash('warning', 'You missed some steps, please try again!');
                $next_step_url = route('user.place-listing-setup.place-listings.create');
                return $next_step_url;
            }

            // Dispatch the account setup job
            SetupPlaceListingJob::dispatch(session('place_listing_setup'), Auth::user());

            // clear the session.
            // session()->forget('place_listing_setup');

            $next_step_url = route('user.place-listings.index');
            session()->flash('success', 'Your place registration is currently being processed, you will be notified when complete.');
            return $next_step_url;
        }
    }

    public static function isPlaceListingSetupInfoComplete()
    {
        if (!session()->has('place_listing_setup.place_listings')) {
            return false;
        }

        if ((!session()->has('place_listing_setup.place_listing_location'))) {
            return false;
        }

        if ((!session()->has('place_listing_setup.place_listing_amenities'))) {
            return false;
        }

        return true;
    }
}
