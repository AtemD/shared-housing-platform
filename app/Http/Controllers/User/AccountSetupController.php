<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSetupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the current authenticated user
        $user = auth()->user();

        return view('user/basic-profile/create', compact(
            'user'
        ));
    }
}
