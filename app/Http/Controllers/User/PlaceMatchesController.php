<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        // user policy here to check if the user is allowed to execute this function
        $places = Place::with([
            'user', 
            'amenities',
            'placeLocation.city',
            'placeLocation.locality'
        ])->simplePaginate();

        // dd($places->toArray());

        return view('user/matches/places/index', compact('places'));
    }
}
