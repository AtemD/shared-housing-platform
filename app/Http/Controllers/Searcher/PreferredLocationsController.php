<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Models\PreferredLocation;
use Illuminate\Http\Request;

class PreferredLocationsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreferredLocation  $preferredLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PreferredLocation $preferredLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreferredLocation  $preferredLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PreferredLocation $preferredLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreferredLocation  $preferredLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreferredLocation $preferredLocation)
    {
        return back()->with('success', 'Preferred Location Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreferredLocation  $preferredLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreferredLocation $preferredLocation)
    {
        //
    }
}
