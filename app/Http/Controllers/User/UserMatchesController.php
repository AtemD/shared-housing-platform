<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\References\ProfileStatus;
use App\References\UserType;

// use Illuminate\Http\Request;

class UserMatchesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        
        $people = User::where('type', UserType::SEARCHER)
            ->where('profile_status', ProfileStatus::COMPLETE)
            ->with([
                'basicProfile',
                'placeListingPreference'
            ])->simplePaginate();
            // dd($people->toArray());
        return view('user/matches/users/index', compact('people'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->load([
            'basicProfile.occupations',
            'placeListingPreference',
            'compatibilityPreference'
        ]);

// dd($user->toArray());
        return view('user/matches/users/show', compact('user'));
    }
}
