<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Http\Requests\StoreLocalityRequest;
use App\Http\Requests\UpdateLocalityRequest;

class LocalityController extends Controller
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
     * @param  \App\Http\Requests\StoreLocalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(Locality $locality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(Locality $locality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalityRequest  $request
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalityRequest $request, Locality $locality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locality $locality)
    {
        //
    }
}
