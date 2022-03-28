<?php 

namespace App\Helpers;

use App\Jobs\SetupUserAccount;
use App\References\ProfileStatus;
use App\References\UserType;

class AccountSetup
{
    const STEP_1 = "basic_profile";
    const STEP_2 = "place_listing";
    const STEP_3 = "place_listing_preference";
    const STEP_4 = "personal_preferences";
    const STEP_5 = "compatibility_preferences";
    const STEP_6 = "interests";
    const STEP_7 = "complete";

    /**
     * determine next step
     * 
     * @return array
     */
     public static function determineNextStep()
     {
        // session(['account_setup_step' => self::STEP_1]);
        // dd(session('account_setup_step'));
        session()->has('account_setup_step') ?: session(['account_setup_step' => self::STEP_1]);

        // dd(session('account_setup_step'));
        
        $step = session('account_setup_step');

        // basic profile
        if($step == self::STEP_1){
            $url = route('user.account-setup.basic-profile.create');

            // user type is needed to choose between step 2 or step 3
            $user_type = auth()->user()->type;
            if($user_type == UserType::LISTER){
                session(['account_setup_step' => self::STEP_2]);
            }
            if($user_type == UserType::SEARCHER){
                session(['account_setup_step' => self::STEP_3]);
            }

            return $url;
        }

        if($step == self::STEP_2){
            $url = route('user.account-setup.place-listings.create');
            session(['account_setup_step' => self::STEP_4]);
            return $url;
        }

        if($step == self::STEP_3){
            $url = route('user.account-setup.place-listing-preferences.create');
            session(['account_setup_step' => self::STEP_4]);
            return $url;
        }

        if($step == self::STEP_4){
            $url = route('user.account-setup.personal-preferences.create');
            session(['account_setup_step' => self::STEP_5]);
            return $url;
        }

        if($step == self::STEP_5){
            $url = route('user.account-setup.compatibility-preferences.create');
            session(['account_setup_step' => self::STEP_6]);
            return $url;
        }

        if($step == self::STEP_6){
            $url = route('user.account-setup.interests.create');
            // $url = route('user.home');
            session(['account_setup_step' => self::STEP_7]);

            // Dispatch the account setup job
            // SetupUserAccount::dispatch(session('account_setup'));

            // clear the session.
            // change the profile status
            
            // push all session account-setup information to the queue for processing
            // notify the user that their account if being setup
            // at the homepage, once profile setup is complete, retrieve the filtered results and show them
            // session(['info' => 'Your profile is being setup, you will be notified when its complete']);

            return $url; // to return the user back to home page
        }

        if($step == self::STEP_7){
            $url = route('user.home');

            // Dispatch the account setup job
            // SetupUserAccount::dispatch(session('account_setup'));

            // clear the session.
            // change the profile status
            auth()->user()->update(['profile_status' => ProfileStatus::PROCESSING]);
            // notify the user that their account if being setup
            // session(['info' => 'Your profile is being setup, you will be notified when its complete']);
            

            return $url; // to return the user back to home page
        }

        //  dd(route('user.home'));
        //  dd(AccountSetup::STEP_1);
        // dd('next');
     }

}