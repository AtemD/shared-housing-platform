<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;

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

        return view('searcher/basic-profile/create', compact(
            'user'
        ));
    }
}
