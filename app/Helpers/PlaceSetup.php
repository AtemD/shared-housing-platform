<?php

namespace App\Helpers;

use App\Jobs\SetupPlaceJob;
use Illuminate\Support\Facades\Auth;

class PlaceSetup
{
    // profile setup steps
    const STEP_START = "start";
    const STEP_1     = "place";
    const STEP_2     = "place_location";
    const STEP_3     = "amenities";
    const STEP_LAST  = "last";

    /**
     * determine next step
     * 
     * @return array
     */
    public static function determineNextStep($current_step = self::STEP_START)
    {
        if ($current_step == self::STEP_START) 
        {
            $next_step_url = route('lister.place-setup.places.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_1) 
        {
            $next_step_url = route('lister.place-setup.place-locations.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_2) 
        {
            $next_step_url = route('lister.place-setup.place-amenities.create');
            return $next_step_url;
        }

        // The final step 
        if ($current_step == self::STEP_LAST) {
            // First determine that all steps form data is in the session
            if (!self::isPlaceSetupInfoComplete()) 
            {
                // dd(session('place_setup'));
                session()->flash('warning', 'You missed some steps, please try again!');
                $next_step_url = route('lister.place-setup.places.create');
                return $next_step_url;
            }

            // Dispatch the account setup job
            SetupPlaceJob::dispatch(session('place_setup'), Auth::user());

            // clear the session.
            // session()->forget('place_setup');

            $next_step_url = route('lister.places.index');
            session()->flash('success', 'Your place registration is currently being processed, you will be notified when complete.');
            return $next_step_url;
        }
    }

    public static function isPlaceSetupInfoComplete()
    {
        if (!session()->has('place_setup.places')) 
        {
            return false;
        }

        if ((!session()->has('place_setup.place_location'))) 
        {
            return false;
        }

        if ((!session()->has('place_setup.place_amenities'))) 
        {
            return false;
        }

        return true;
    }
}
