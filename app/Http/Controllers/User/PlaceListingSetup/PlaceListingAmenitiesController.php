<?php

namespace App\Http\Controllers\User\PlaceListingSetup;

use App\Http\Controllers\Controller;
use App\Helpers\PlaceListingSetup;
use App\Models\Amenity;
use Illuminate\Http\Request;

class PlaceListingAmenitiesController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::all();

        return view('user/place-listing-setup/place-listing-amenities/create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // place_listing_id, city_id, locality_id, street, specific_information, address, lat, long
        $validatedData = $request->validate([
            'amenities' => ['required', 'min:1', 'exists:amenities,id'],
        ]);

        // Store the personal preferences in the session
        $request->session()->put('place_listing_setup.place_listing_amenities', 
            $validatedData['amenities']
        );

        // dd(session('place_listing_setup'));

        $next_step = PlaceListingSetup::determineNextStep(PlaceListingSetup::STEP_LAST);
        return redirect($next_step);
    }
}
