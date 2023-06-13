<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Jobs\MatchSearcherWithListersJob;
use App\Models\Place;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;

class PlaceMatchesController extends Controller
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
        // Obtain all the user matches
        $places = auth()->user()->placeMatches()->with([
            'user',
            'amenities',
            'placeLocation.city',
            'placeLocation.locality'
        ])->simplePaginate();
        // dd($places->toArray());
        return view('searcher/matches/places/index', compact('places'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $place = $place->load([
            'user.compatibilityPreference',
            'amenities',
            'placeLocation.city',
            'placeLocation.locality',
        ]);

        // Get the current authenticated user match that owns the retrieved place above
        $auth_user = auth()->user()->load([
            'matches' => function ($query) use($place){
                $query->where('matched_user_id', $place->user->id)->first();
            }
        ]);

        $placeRequestSentBySearcherToLister = auth()->user()->sentPlaceRequests()->where('place_id', $place->id)->first();

        // dd($placeRequestSentBySearcherToLister->toArray());

        // dd($auth_user->toArray());
        // dd($auth_user->matches->first()->pivot->compatibility_percentage);

        return view('searcher/matches/places/show', compact('place', 'auth_user', 'placeRequestSentBySearcherToLister'));
    }
}
