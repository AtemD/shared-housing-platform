<?php

namespace App\Http\Controllers\Searcher;

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

        return view('searcher/matches/users/index', compact('people'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->getAttributes()['type'] == UserType::LISTER) 
        {
            // get the place request the currently authenticated user sent to this user
            $requestSentToAuthenticatedUser = auth()->user()->placeRequests()->where('sender_id', $user->id)->first();
            // dd($requestSentToAuthenticatedUser->toArray());

            // dd(User::where('type', UserType::LISTER)->get()->toArray());
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
            return view('searcher/matches/users/listers/show', compact('user', 'requestSentToAuthenticatedUser'));
        }

        if ($user->getAttributes()['type'] == UserType::SEARCHER) 
        {
            // get the place request the currently authenticated user sent to this user
            $requestSentToAuthenticatedUser = auth()->user()->placeRequests()->where('sender_id', $user->id)->first();
            // dd($requestSentToAuthenticatedUser->toArray());

            // dd(User::where('type', UserType::LISTER)->get()->toArray());
            $user = $user->load([
                'basicProfile.occupations',
                'placePreference',
                'personalPreference',
                'compatibilityPreference',
                'interests',
                'placeRequests' => function ($query) {
                    $query->where('sender_id', auth()->user()->id);
                },
            ]);
            return view('searcher/matches/users/searchers/show', compact('user', 'requestSentToAuthenticatedUser'));
        }

        return back()->with('error', 'There was a problem viewing this user');
    }
}
