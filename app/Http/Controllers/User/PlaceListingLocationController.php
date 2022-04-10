<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PlaceListingLocation;
use App\Http\Requests\StorePlaceListingLocationRequest;
use App\Http\Requests\UpdatePlaceListingLocationRequest;

class PlaceListingLocationController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * @param  \App\Http\Requests\StorePlaceListingLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaceListingLocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceListingLocation $placeListingLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceListingLocation $placeListingLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaceListingLocationRequest  $request
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlaceListingLocationRequest $request, PlaceListingLocation $placeListingLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaceListingLocation  $placeListingLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceListingLocation $placeListingLocation)
    {
        //
    }
}
