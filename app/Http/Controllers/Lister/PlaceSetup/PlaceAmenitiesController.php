<?php

namespace App\Http\Controllers\Lister\PlaceSetup;

use App\Http\Controllers\Controller;
use App\Helpers\PlaceSetup;
use App\Models\Amenity;
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
        $amenities = Amenity::all();

        return view('lister/place-setup/place-amenities/create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // place_id, city_id, locality_id, street, specific_information, address, lat, long
        $validatedData = $request->validate([
            'amenities' => ['required', 'min:1', 'exists:amenities,id'],
        ]);

        // Store the personal preferences in the session
        $request->session()->put('place_setup.place_amenities', 
            $validatedData['amenities']
        );

        // dd(session('place_setup'));

        $next_step = PlaceSetup::determineNextStep(PlaceSetup::STEP_LAST);
        return redirect($next_step);
    }
}
