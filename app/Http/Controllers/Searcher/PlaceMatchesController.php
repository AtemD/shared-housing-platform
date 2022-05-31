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

        return view('searcher/matches/places/show', compact('place'));
    }
}
