<?php

namespace App\Http\Controllers\User\PlaceListingSetup;

use App\Http\Controllers\Controller;
use App\Helpers\PlaceListingSetup;
use App\Models\City;
use Illuminate\Http\Request;

class PlaceListingLocationsController extends Controller
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
        $cities = City::all();

        return view('user/place-listing-setup/place-listing-locations/create', compact('cities'));
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
            'city' => ['required', 'integer', 'exists:cities,id'],
            // 'locality' => ['required', 'string', 'max:255', 'exists:localities,id'],
            'street' => ['required', 'string', 'max:255'],
            'specific_information'  => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'], 
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);
        // dd('hit');
        $request->session()->put('place_listing_setup.place_listing_location', [
            'city' => $validatedData['city'],
            'locality' => 12,  // $validatedData['locality'],
            'street' => $validatedData['street'],
            'specific_information' => $validatedData['specific_information'],
            'address' => $validatedData['address'],
            'lat' => $validatedData['latitude'],
            'lng' => $validatedData['longitude']
        ]);

        // dd(session('place_listing_setup'));

        $next_step = PlaceListingSetup::determineNextStep(PlaceListingSetup::STEP_2);
        return redirect($next_step);
    }
}
