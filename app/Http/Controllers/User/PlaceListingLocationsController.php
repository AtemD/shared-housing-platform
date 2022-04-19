<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PlaceListingLocation;
// use App\Http\Requests\StorePlaceListingLocationRequest;
// use App\Http\Requests\UpdatePlaceListingLocationRequest;
use App\Models\City;
use Illuminate\Http\Request;

class PlaceListingLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlaceListingLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceListingLocation $placeListingLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceListingLocation $place_listing_location)
    {
        $place_listing_location = $place_listing_location->load('placeListing');
        $cities = City::all();
        return view('user/place-listing-locations/edit', compact('place_listing_location', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaceListingLocationRequest  $request
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceListingLocation $placeListingLocation)
    {
        // dd($request->toArray());
        // place_listing_id, city_id, locality_id, street, specific_information, address, lat, long
        $validatedData = $request->validate([
            'city' => ['required', 'integer', 'exists:cities,id'],
            // 'locality' => ['required', 'string', 'max:255', 'exists:localities,id'],
            'street' => ['required', 'string', 'max:255'],
            'specific_information'  => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'], 
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        $placeListingLocation->update([
            'city_id' => $validatedData['city'],
            'locality_id' => 12,  // $validatedData['locality'],
            'street' => $validatedData['street'],
            'specific_information' => $validatedData['specific_information'],
            'address' => $validatedData['address'],
            'lat' => $validatedData['latitude'],
            'lng' => $validatedData['longitude']
        ]);
    
        return back()->with('success', 'The Location Details Have Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceListingLocation $placeListingLocation)
    {
        //
    }
}
