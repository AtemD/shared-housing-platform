<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\References\Country as ReferencesCountry;
use Illuminate\Http\Request;

class RegionsController extends Controller
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
        // $this->authorize('view', Region::class);

        $regions = Region::paginate(30);
        $countries = collect(ReferencesCountry::countriesList());
// dd($countries->toArray());
        return view('admin/regions/index', compact(
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
        $this->authorize('create', Region::class);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'country' => 'required|integer|exists:countries,id',
            'status' => 'nullable'
        ]);

        Region::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'country_id' => $request->country,
            'is_enabled' => (bool)$request->status
        ]);

        return back()->with('success', 'New Region Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $this->authorize('update', Region::class);

        $countries = Country::all();

        $region = $region->load('country');

        return view('admin/regions/edit', compact(
            'region',
            'countries'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->authorize('update', Region::class);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'country' => 'required|integer|exists:countries,id',
            'status' => 'nullable'
        ]);

        $region->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'country_id' => $request->country,
            'is_enabled' => (bool)$request->status
        ]);

        return back()->with('success', 'Region Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $this->authorize('delete', Region::class);

        $region->delete();
        return back()->with('success', 'Region Deleted Successfully');
    }
}
