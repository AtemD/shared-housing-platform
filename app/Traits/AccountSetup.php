<?php

namespace App\Traits;

use App\References\UserType;

trait AccountSetup
{

    protected function redirectIfNotCorrectStep($user)
    {

        $user_type = $user->user_type;

        if (!$this->hasBasicProfile($user)) {
            return redirect()->route('user.account-setup.basic-profile.create');
        }

        if ((!$this->hasPlaceListingPreferences($user)) && ($user_type == UserType::SEARCHER)) {
            return redirect()->route('user.account-setup.place-listing-preferences.create');
        }

        if (!$this->hasPlaceListings($user) && ($user_type == UserType::LISTER)) {
            redirect()->route('user.account-setup.place-listings.create');
        }


        // if(!$this->hasPersonalPreferences($user)){

        // }

        // if(!$this->hasCompatibilityPreferences($user)){

        // }

        // if(!$this->hasHobbies($user)){

        // }

        // if(!$this->hasCompatibilityQuestions($user)){

        // }

        // redirect to homepage if we reach here.
        if ($user_type == UserType::LISTER) {
            return redirect()->route('user.home');
        }
        return redirect()->route('admin.home');


        // Determine percentage completion of users profile, redirect to appropriate step

        // Obtain the currently authenticated user
        // See the relationship the user has to various models
        // if the user has no data with an essential model, then redirect to appropriate setup page.

        // Here we determine which step the user should be in,
        // If the user completed their profile, then this invoke redirect the user to their homepage

        // Obtain the currently authenticated user.
        // $user = auth()->user();
    }

    /**
     * Check whether the users has a basic profile.
     * 
     * @return bool
     */
    protected function hasBasicProfile($user)
    {
        $result = $user->basicProfile()->exists();
        return $result;
    }

    /**
     * Check whether the users has living place preferences.
     * 
     * @return bool
     */
    protected function hasPlaceListingPreferences($user)
    {
        $result = $user->placeListingPreferences()->exists();
        return $result;
    }

    /**
     * Check whether the users has living place listings.
     * 
     * @return bool
     */
    protected function hasPlaceListings($user)
    {
        $result = $user->placeListings()->exists();
        return $result;
    }
}
