<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\Lister;
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
        $this->middleware(['auth', 'profile.setup']);
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
                'basicProfile.occupations',
                'placePreference',
                'userLocation.city',
                'userLocation.locality'
            ])->simplePaginate();

        return view('lister/matches/users/index', compact('people'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // get the place request the currently authenticated user sent to this user
        $requestSentToAuthenticatedUser = auth()->user()->placeRequests()->where('sender_id', $user->id)->first();
        $requestSentByAuthenticatedUser = auth()->user()->sentPlaceRequests()->where('sender_id', auth()->user()->id)->first();
        // dd($requestSentByAuthenticatedUser->toArray());

        // get all the places by the authenticated Lister that match the current user place preference
        $listersPlacesMatchedToCurrentUser = auth()->user()->places()->get();
        // dd($listersPlacesMatchedToCurrentUser->toArray());
        
        $user = $user->load([
            'basicProfile.occupations',
            'places',
            'placePreference',
            'personalPreference',
            'compatibilityPreference',
            'interests',
            'placeRequests' => function ($query) {
                $query->where('sender_id', auth()->user()->id);
            },
        ]);

        return view('lister/matches/users/show', compact('user', 'requestSentToAuthenticatedUser', 'listersPlacesMatchedToCurrentUser', 'requestSentByAuthenticatedUser'));
    }
}
