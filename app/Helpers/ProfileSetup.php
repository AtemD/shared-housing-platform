<?php

namespace App\Helpers;

use App\Jobs\SetupUserProfileJob;
use App\References\ProfileStatus;
use App\References\UserType;
use Illuminate\Support\Facades\Auth;

class ProfileSetup
{
    // profile setup steps
    const STEP_START        = "start";
    const STEP_1            = "basic_profile";
    const STEP_2_LISTER     = "place_listing";
    const STEP_2_SEARCHER   = "place_listing_preference";
    const STEP_3            = "personal_preferences";
    const STEP_4            = "compatibility_preferences";
    const STEP_5            = "interests";

    /**
     * determine next step
     * 
     * @return array
     */
    public static function determineNextStep($current_step = self::STEP_START)
    {
        if ($current_step == self::STEP_START) {
            $next_step_url = route('user.profile-setup.basic-profile.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_1) {
            $user_type = auth()->user()->type;
            if ($user_type == UserType::LISTER) {
                $next_step_url = route('user.profile-setup.place-listings.create');
                return $next_step_url;
            }

            if ($user_type == UserType::SEARCHER) {
                $next_step_url = route('user.profile-setup.place-listing-preferences.create');
                return $next_step_url;
            }
        }

        if ($current_step == self::STEP_2_LISTER || $current_step == self::STEP_2_SEARCHER) {
            $next_step_url = route('user.profile-setup.personal-preferences.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_3) {
            $next_step_url = route('user.profile-setup.compatibility-preferences.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_4) {
            $next_step_url = route('user.profile-setup.interests.create');
            return $next_step_url;
        }

        // The final step 
        if ($current_step == self::STEP_5) {
            // First determine that all steps form data is in the session
            if (!self::isProfileSetupInfoComplete()) {
                // dd(session('profile_setup'));
                session()->flash('warning', 'Some steps were skipped, please try again!');
                $next_step_url = route('user.profile-setup.basic-profile.create');
                return $next_step_url;
            }
            // dd('success');

            // Dispatch the account setup job
            SetupUserProfileJob::dispatch(session('profile_setup'), Auth::user());

            // clear the session.
            // session()->forget('profile_setup');

            // change the profile status
            auth()->user()->update(['profile_status' => ProfileStatus::PROCESSING]);
            // notify the user that their account if being setup
            // session(['info' => 'Your profile is being setup, you will be notified when its complete']);

            $next_step_url = route('user.compatibility-questions.unanswered.index');
            session()->flash('success', 'You successfully completed your profile Setup! Please answer one or more of the following questions that will be used for matching purpose.');
            return $next_step_url;
        }
    }

    public static function isProfileSetupInfoComplete()
    {
        $is_complete = true;

        if (!session()->has('profile_setup.basic_profile')) {
            $is_complete = false;
        }

        if ((!session()->has('profile_setup.place_listings')) && auth()->user()->type == UserType::LISTER) {
            $is_complete = false;
        }

        if ((!session()->has('profile_setup.place_listing_preferences')) && auth()->user()->type == UserType::SEARCHER) {
            $is_complete = false;
        }

        if (!session()->has('profile_setup.personal_preferences')) {
            $is_complete = false;
        }

        if (!session()->has('profile_setup.compatibility_preferences')) {
            $is_complete = false;
        }

        if (!session()->has('profile_setup.interests')) {
            $is_complete = false;
        }

        return $is_complete;
    }
}
