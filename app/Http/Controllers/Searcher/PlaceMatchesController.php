<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Jobs\MatchSearcherWithListersJob;
use App\Models\Place;

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
        // retrieve all the users place preferences, preferred locations
        // retrieve places that match this
        // $place_preferences = auth()->user()->placePreference()->firstOrFail();
        // $city_id = $place_preferences->preferredLocations()->get()->pluck('city_id')[0];
        // dd($city_id);
        // dd($place_preferences->getAttributes()['min_rent_amount']);
        // dd($place_preferences->toArray());

        $matches = auth()->user()->matches()->get();
        dd($matches->toArray());

        $places = $places->with([
            'user',
            'amenities',
            'placeLocation.city',
            'placeLocation.locality'
        ])->simplePaginate();

        // user policy here to check if the user is allowed to execute this function
        $places = Place::with([
            'user', 
            'amenities',
            'placeLocation.city',
            'placeLocation.locality'
        ])->simplePaginate();

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
