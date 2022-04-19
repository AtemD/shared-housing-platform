<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helpers\PlaceListingSetup;
use App\Models\Amenity;
use App\Models\PlaceListing;
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
        // $amenities = Amenity::all();

        // return view('user/place-listing-setup/place-listing-amenities/create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'amenities' => ['required', 'min:1', 'exists:amenities,id'],
        // ]);

        // // Store the personal preferences in the session
        // $request->session()->put('place_listing_setup.place_listing_amenities', 
        //     $validatedData['amenities']
        // );

        // $next_step = PlaceListingSetup::determineNextStep(PlaceListingSetup::STEP_LAST);
        // return redirect($next_step);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceListing $place_listing)
    {
        $place_listing = $place_listing->load('amenities');
        $amenities = Amenity::all();

        return view('user/place-listings/amenities/edit', compact('place_listing', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\PlaceListing  $place_listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceListing $place_listing)
    {
        $validatedData = $request->validate([
            'amenities' => ['required', 'min:1', 'exists:amenities,id'],
        ]);

        $place_listing->amenities()->sync($validatedData['amenities']);
    
        return back()->with('success', 'The Place Listing Amenities Have Been Updated Successfully');
    }
}
