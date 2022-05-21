<?php

namespace App\Http\Controllers\User\ProfileSetup;

use App\Http\Controllers\Controller;
use App\Helpers\ProfileSetup;
use App\Models\City;
use Illuminate\Http\Request;

class UserLocationsController extends Controller
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

        return view('user/profile-setup/user-locations/create', compact('cities'));
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
            'city' => ['required', 'integer', 'exists:cities,id'],
            // 'locality' => ['required', 'string', 'max:255', 'exists:localities,id'],
        ]);
        // dd('hit');
        $request->session()->put('profile_setup.user_locations', [
            'city' => $validatedData['city'],
            'locality' => 12,  // $validatedData['locality'],
        ]);

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_6);
        return redirect($next_step);
    }
}
