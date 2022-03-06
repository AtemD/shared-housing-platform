<?php 

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @param $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = Auth::user()->isAdmin() ? RouteServiceProvider::HOME_ADMIN : RouteServiceProvider::HOME_USER;
        return redirect()->intended($home);
    }
}