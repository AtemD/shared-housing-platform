<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Region;
use App\References\Country as ReferencesCountry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view', City::class);

        $cities = City::with('region')->paginate(30);
        $countries = collect(ReferencesCountry::countriesList());
        $regions = Region::all();

        return view('admin/cities/index', compact(
            'cities',
            'regions',
            'countries'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', City::class);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'description' => 'required|max:255',
            'region' => 'required|integer|exists:regions,id',
            'status' => 'nullable'
        ]);

        City::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'description' => $request->description,
            'region_id' => $request->region,
            'is_enabled' => (bool)$request->status
        ]);

        return back()->with('success', 'New City Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $this->authorize('update', City::class);

        // *Note: delete this code once you implement dynamic/dependent dropdown feature: for countries, regions and cities
        $countries = Country::all();
        $regions = Region::all();

        $city = $city->load('region.country');

        return view('admin/cities/edit', compact(
            'countries',
            'regions',
            'city'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    { 
        $this->authorize('update', City::class);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'description' => 'required|max:255',
            'region' => 'required|integer|exists:regions,id',
            'status' => 'nullable'
        ]);

        $city->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'description' => $request->description,
            'region_id' => $request->region,
            'is_enabled' => (bool)$request->status
        ]);

        return back()->with('success', 'City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->authorize('delete', City::class);

        $city->delete();
        return back()->with('success', 'City Deleted Successfully');
    }
}
