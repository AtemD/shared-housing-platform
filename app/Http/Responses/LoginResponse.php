<?php 

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use App\References\UserType;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $user_type = Auth::user()->type;

        if($user_type == UserType::SEARCHER){
            return redirect()->intended(RouteServiceProvider::HOME_SEARCHER);
        }

        if($user_type == UserType::LISTER){
            return redirect()->intended(RouteServiceProvider::HOME_LISTER);
        }

        if($user_type == UserType::ADMIN){
            return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
        }

        // $home = Auth::user()->isAdmin() ? RouteServiceProvider::HOME_ADMIN : RouteServiceProvider::HOME_USER;
        // return redirect()->intended($home);
    }
}