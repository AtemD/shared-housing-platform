<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Locality;
use App\Models\UserLocation;
use Illuminate\Http\Request;

class UserLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load([
            'userLocation'
        ]);

        $cities = City::all();

        return view('lister/user-locations/index', compact('user', 'cities'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function show(UserLocation $userLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLocation $user_location)
    {
        $user_location = $user_location->load('placeListing');
        $cities = City::all();
        return view('lister/user-locations/edit', compact('user_location', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLocation $userLocation)
    {
        $validatedData = $request->validate([
            'city' => ['required', 'integer', 'exists:cities,id'],
            // 'locality' => ['required', 'string', 'max:255', 'exists:localities,id'],
        ]);

        $userLocation->update([
            'city_id' => $validatedData['city'],
            'locality_id' => Locality::where('city_id', $validatedData['city'])->get()->random()->id,  // $validatedData['locality'],
        ]);
    
        return back()->with('success', 'Your Location Details Have Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLocation $userLocation)
    {
        //
    }
}
