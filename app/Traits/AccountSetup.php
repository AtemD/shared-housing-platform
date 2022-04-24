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

        if ((!$this->hasPlacePreferences($user)) && ($user_type == UserType::SEARCHER)) {
            return redirect()->route('user.account-setup.place-preferences.create');
        }

        if (!$this->hasPlaces($user) && ($user_type == UserType::LISTER)) {
            redirect()->route('user.account-setup.places.create');
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
    protected function hasPlacePreferences($user)
    {
        $result = $user->placePreferences()->exists();
        return $result;
    }

    /**
     * Check whether the users has living place s.
     * 
     * @return bool
     */
    protected function hasPlaces($user)
    {
        $result = $user->places()->exists();
        return $result;
    }
}
