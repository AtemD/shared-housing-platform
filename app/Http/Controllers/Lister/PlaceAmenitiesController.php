<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceAmenitiesController extends Controller
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

        // return view('lister/place-setup/place-amenities/create', compact('amenities'));
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
        // $request->session()->put('place_setup.place_amenities', 
        //     $validatedData['amenities']
        // );

        // $next_step = PlaceSetup::determineNextStep(PlaceSetup::STEP_LAST);
        // return redirect($next_step);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceLocation  $placeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $place = $place->load('amenities');
        $amenities = Amenity::all();

        return view('lister/places/amenities/edit', compact('place', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $validatedData = $request->validate([
            'amenities' => ['required', 'min:1', 'exists:amenities,id'],
        ]);

        $place->amenities()->sync($validatedData['amenities']);
    
        return back()->with('success', 'The Place  Amenities Have Been Updated Successfully');
    }
}
