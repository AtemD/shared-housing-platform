<?php

namespace App\Http\Controllers\User\ProfileSetup;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Helpers\ProfileSetup;
use App\Models\City;
use App\Models\Locality;
use App\References\PeriodType;
use Illuminate\Http\Request;

class PlacePreferencesController extends Controller
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
        return view('user/profile-setup/place-preferences/create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'min_rent_amount' => ['required', 'integer'],
            'max_rent_amount' => ['required', 'integer'],
            'rent_period_type' => ['required', 'integer', Rule::in(array_keys(PeriodType::rentPeriodTypeList()))],
            'availability_date' => ['required', 'date_format:Y-m-d'],
            'city' => ['required', 'integer', 'exists:cities,id'],
        ]);
// dd(Locality::where('city_id', $validatedData['city'])->get()->pluck('id')->toArray());
        // Store the validated data in the session
        $request->session()->put('profile_setup.place_preferences', [
            'min_rent_amount' => $validatedData['min_rent_amount'],
            'max_rent_amount' => $validatedData['max_rent_amount'],
            'rent_period' => PeriodType::convertPeriodTypeToDays($validatedData['rent_period_type']),
            'availability_date' => $validatedData['availability_date'],
        ]);

        $request->session()->put('profile_setup.place_preference_preferred_locations', [
            'city' => $validatedData['city'],
            'localities' => Locality::where('city_id', $validatedData['city'])->get()->random(mt_rand(1, 10))->pluck('id'),
        ]);
        // dd($request->toArray());
        // dd($request->session('profile_setup'));
        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_2_SEARCHER);
        return redirect($next_step);
    }
}
