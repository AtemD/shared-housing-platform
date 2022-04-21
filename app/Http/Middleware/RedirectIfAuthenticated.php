<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\References\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(
                    $this->determineUserRoute(Auth::user()->type)
                    // Auth::user()->isAdmin() ? RouteServiceProvider::HOME_ADMIN : RouteServiceProvider::HOME_USER
                );
            }
        }

        return $next($request);
    }

    public function determineUserRoute($user_type)
    {
        if($user_type == UserType::SEARCHER){
            return RouteServiceProvider::HOME_SEARCHER;
        }

        if($user_type == UserType::LISTER){
            return RouteServiceProvider::HOME_LISTER;
        }

        if($user_type == UserType::ADMIN){
            return RouteServiceProvider::HOME_ADMIN;
        }
    }
}
