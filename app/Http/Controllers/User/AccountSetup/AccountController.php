<?php

namespace App\Http\Controllers\User\AccountSetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Determine percentage completion of users profile, redirect to appropriate step
        
        // Obtain the currently authenticated user
        // See the relationship the user has to various models
        // if the user has no data with an essential model, then redirect to appropriate setup page.

        // Here we determine which step the user should be in,
        // If the user completed their profile, then this invoke redirect the user to their homepage

    }

    private function determineAccountCompletionPercentage(){

    }
}
