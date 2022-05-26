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
        // Dispatch the account setup job
        // SetupPlaceJob::dispatch(session('place_setup'), Auth::user());

        // MatchSearcherWithListersJob::dispatch(auth()->user());


        // retrieve all the users place preferences, preferred locations
        // retrieve places that match this
        // $place_preferences = auth()->user()->placePreference()->firstOrFail();
        // $city_id = $place_preferences->preferredLocations()->get()->pluck('city_id')[0];
        // dd($city_id);
        // dd($place_preferences->getAttributes()['min_rent_amount']);
        // dd($place_preferences->toArray());



        // $places = (new Place)->newQuery();

        // $places = $places->whereBetween('rent_amount', [
        //     $place_preferences->getAttributes()['min_rent_amount'],
        //     $place_preferences->getAttributes()['max_rent_amount']
        // ]);

        // $places = $places->whereHas('placeLocation', function($query) use($city_id){
        //     $query->where('city_id', $city_id);
        // });

        // $shop = $shop->whereHas('shopLocation', function($query) use($city_id){
        //     $query->where('city_id', $city_id);
        // });

        // $places = $places->with([
        //     'user',
        //     'amenities',
        //     'placeLocation.city',
        //     'placeLocation.locality'
        // ])->simplePaginate();

        // dd($places->count());

        // dd('done processing the job');

        // $places = collect();
        // dd('hit');
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
