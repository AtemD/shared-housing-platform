<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\PlaceLocation;
// use App\Http\Requests\StorePlaceLocationRequest;
// use App\Http\Requests\UpdatePlaceLocationRequest;
use App\Models\City;
use App\Models\Locality;
use Illuminate\Http\Request;

class PlaceLocationsController extends Controller
{
    /**
     * Display a  of the resource.
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
     * @param  \App\Http\Requests\StorePlaceLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaceLocation  $placeLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceLocation $placeLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceLocation  $placeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceLocation $place_location)
    {
        $place_location = $place_location->load('place');
        $cities = City::all();
        return view('lister/place-locations/edit', compact('place_location', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaceLocationRequest  $request
     * @param  \App\Models\PlaceLocation  $placeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceLocation $placeLocation)
    {
        // dd($request->toArray());
        // place_id, city_id, locality_id, street, specific_information, address, lat, long
        $validatedData = $request->validate([
            'city' => ['required', 'integer', 'exists:cities,id'],
            // 'locality' => ['required', 'string', 'max:255', 'exists:localities,id'],
            'street' => ['required', 'string', 'max:255'],
            'specific_information'  => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'], 
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        $placeLocation->update([
            'city_id' => $validatedData['city'],
            'locality_id' => Locality::where('city_id', $validatedData['city'])->get()->random(1)->pluck('id'),  // $validatedData['locality'],
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
     * @param  \App\Models\PlaceLocation  $placeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceLocation $placeLocation)
    {
        //
    }
}
