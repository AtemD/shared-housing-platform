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
        
        if(auth()->user()->profile_status == ProfileStatus::INCOMPLETE){
            $next_step = ProfileSetup::determineNextStep();
            return redirect($next_step);
        }


        return $next($request);
    }
    
}
