<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Helpers\ProfileSetup;
use App\Models\City;
use App\Models\PlacePreference;
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
     * Display a  of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load([
            'placePreference.preferredLocations',
        ]);
        // dd($user->toArray());
        $cities = City::all();
// dd($user->toArray());
        return view('user/place-preferences/index', compact('user', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/place-preferences/create');
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
        ]);

        // Store the validated data in the session
        $request->session()->put('profile_setup.place_preferences', [
            'min_rent_amount' => $validatedData['min_rent_amount'],
            'max_rent_amount' => $validatedData['max_rent_amount'],
            'rent_period' => PeriodType::convertPeriodTypeToDays($validatedData['rent_period_type']),
            'availability_date' => $validatedData['availability_date'],
        ]);
        
        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_2_SEARCHER);
        return redirect($next_step);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlacePreference $place_preference)
    {
        // dd($request->toArray());
        $validatedData = $request->validate([
            'min_rent_amount' => ['required', 'integer'],
            'max_rent_amount' => ['required', 'integer'],
            'rent_period_type' => ['required', 'integer', Rule::in(array_keys(PeriodType::rentPeriodTypeList()))],
            'availability_date' => ['required', 'date_format:Y-m-d'],
        ]);

        $place_preference->update([
            'min_rent_amount' => $validatedData['min_rent_amount'],
            'max_rent_amount' => $validatedData['max_rent_amount'],
            'rent_period' => PeriodType::convertPeriodTypeToDays($validatedData['rent_period_type']),
            'availability_date' => $validatedData['availability_date'],
        ]);
        
        return back()->with('success', 'Your Place Lisiting Preference Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
