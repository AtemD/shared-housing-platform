<?php

namespace App\Http\Middleware;

use App\Helpers\ProfileSetup;
use App\References\ProfileStatus;
use Closure;
use Illuminate\Http\Request;

class RedirectIfNotCorrectProfileSetupStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user()->is_profile_complete == false) {
            // if($request->session('account_setup_ste'))
            // if($request->session()->has('account_setup_step')){
            //     $request->session('account_setup_step') == ProfileSetup::STEP_7;
            //     return $next($request);
            // }

        //     $next_step = ProfileSetup::determineNextStep();
        //     return redirect($next_step);
        // }

        if(auth()->user()->profile_status == ProfileStatus::INCOMPLETE){
            $next_step = ProfileSetup::determineNextStep();
            return redirect($next_step);
        }


        return $next($request);
    }

    // public function redirectIfNotCorrectStep($user)
    // {
        // Check if the users profile is complete,
        // if not display a message on the home page to prompt the user to go and complete their profile
        // if (auth()->user()->is_profile_complete == false) {

            // session()->has('account_setup_step') ?: session(['account_setup_step' => 1]); 
            // dd(session());

            // Redirect the user to appropriate step page

        //     return view('dashboard/user/home');
        // }

        // dd('hitttt');
        // return redirect()->route('user.account-setup.basic-profile.create');

        // redirect to homepage if we reach here.
        // if ($user_type == UserType::LISTER) {
        //     return redirect()->route('user.home');
        // }
        // return redirect()->route('admin.home');


        // Determine percentage completion of users profile, redirect to appropriate step

        // Obtain the currently authenticated user
        // See the relationship the user has to various models
        // if the user has no data with an essential model, then redirect to appropriate setup page.

        // Here we determine which step the user should be in,
        // If the user completed their profile, then this invoke redirect the user to their homepage

        // Obtain the currently authenticated user.
        // $user = auth()->user();
    // }
    
}
