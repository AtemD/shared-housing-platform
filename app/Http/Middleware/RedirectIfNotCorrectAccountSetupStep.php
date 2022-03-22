<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\References\UserType;

class RedirectIfNotCorrectAccountSetupStep
{
    // use AccountSetup;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd('hit new middleware');
        $this->redirectIfNotCorrectStep($request->user());

        return $next($request);
    }

    public function redirectIfNotCorrectStep($user)
    {

        $user_type = $user->user_type;
// dd($user_type);
        if (!$this->hasBasicProfile($user)) {
            return redirect()->route('user.account-setup.basic-profile.create');
        }

        if ((!$this->hasPlaceListingPreferences($user)) && ($user_type == UserType::SEARCHER)) {
            return redirect()->route('user.account-setup.place-listing-preferences.create');
        }

        if (!$this->hasPlaceListings($user) && ($user_type == UserType::LISTER)) {
            dd('hit rr');
            return redirect('user/dashboard/account-setup/place-listings/create');
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
    public function hasBasicProfile($user)
    {
        $result = $user->basicProfile()->exists();
        return $result;
    }

    /**
     * Check whether the users has living place preferences.
     * 
     * @return bool
     */
    public function hasPlaceListingPreferences($user)
    {
        $result = $user->placeListingPreferences()->exists();
        return $result;
    }

    /**
     * Check whether the users has living place listings.
     * 
     * @return bool
     */
    public function hasPlaceListings($user)
    {
        $result = $user->placeListings()->exists();
        return $result;
    }
}
