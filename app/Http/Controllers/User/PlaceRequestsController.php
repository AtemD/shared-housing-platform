<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\References\PlaceRequestStatus;
use Illuminate\Http\Request;

class PlaceRequestsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load('sentPlaceRequests');
        // $user = auth()->user()->load('receivedPlaceRequests');
        // dd($user->toArray());

        return view('user/place-requests/index', compact('user'));
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
    public function update(Request $request, $id)
    {
        // dd($request->toArray());
        // authorize the user, to ensure they can perform this action
        if(!auth()->user()->placeRequests()->find($id)){
            // If the users does not own this place request, then deny its update
            return redirect()->back()->with('error', 'There was a problem updating this request');
        }

        if($request->has('accepted') || $request->has('accept')){
            // dd('hit accepted');
            auth()->user()->placeRequests()->updateExistingPivot($id, ['status' => PlaceRequestStatus::ACCEPTED]);
            return redirect()->back()->with('success', 'Your have successfully accepted the place request');
        }

        if($request->has('declined') || $request->has('decline')){
            // dd('hit declined');
            auth()->user()->placeRequests()->updateExistingPivot($id, ['status' => PlaceRequestStatus::DECLINED]);
            return redirect()->back()->with('success', 'Your have successfully declined the request');
        }

        if($request->has('cancelled') || $request->has('cancel')){
            // dd('hit cancelled');
            auth()->user()->placeRequests()->updateExistingPivot($id, ['status' => PlaceRequestStatus::PENDING]);
            return redirect()->back()->with('success', 'Your have successfully cancelled the request');
        }

        // dd('hit nothing');
        
        return redirect()->back()->with('error', 'There was a problem updating this request');
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
