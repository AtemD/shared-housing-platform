<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PlaceListing;

// use Illuminate\Http\Request;

class PlaceListingMatchesController extends Controller
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
        $places = PlaceListing::with([
            'user', 
            'amenities',
            'placeListingLocation.city',
            'placeListingLocation.locality'
        ])->simplePaginate();

        // dd($places->toArray());

        return view('user/matches/place-listings/index', compact('places'));
    }
}
