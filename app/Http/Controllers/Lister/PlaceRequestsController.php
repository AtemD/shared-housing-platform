<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\References\PlaceRequestStatus;
use App\References\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('lister/place-requests/index', compact('user'));
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
        // dd('hit store');
        $validatedData = $request->validate([
            'user_to_send_request_to' => ['required', 'string', 'exists:users,slug'],
        ]);

        $current_logged_in_user = auth()->user();
        $user_to_send_request_to = User::where('slug', $validatedData['user_to_send_request_to'])->first();

        // A Lister cannot send a request to another Lister
        if($user_to_send_request_to->getAttributes()['type'] == UserType::LISTER && $current_logged_in_user->getAttributes()['type'] == UserType::LISTER){
            return redirect()->back()->with('error', 'There was a problem sending this place request');
        }

        // A user cannot send a request to an Admin user
        if($user_to_send_request_to->getAttributes()['type'] == UserType::ADMIN){
            return redirect()->back()->with('error', 'There was a problem sending this place request');
        }

        // dd($user_to_send_request_to->getAttributes()['type']);
        // dd($current_logged_in_user);
        // store the new place request
        if($request->has('place_request')){
            // dd('hit');
            auth()->user()->sentPlaceRequests()->attach($user_to_send_request_to->id, [
                'status' => PlaceRequestStatus::PENDING,
                'place_id' => auth()->user()->places()->first()->id,
            ]);


            // $user->roles()->attach($roleId, ['expires' => $expires]);
            return redirect()->back()->with('success', 'Your have successfully accepted the place request');
        }

        return redirect()->back()->with('error', 'There was a problem sending this place request');
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
        // dd('hit update');
        // dd($request->toArray());
        // authorize the user, to ensure they can perform this action
        if(!auth()->user()->placeRequests()->find($id)){
            // If the users does not own this place request, then deny its update
            return redirect()->back()->with('error', 'There was a problem updating this place request');
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
        
        return redirect()->back()->with('error', 'There was a problem updating this place request');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // dd('hit delete');
        // The user hitting this method has to be of type Lister,
        // The Lister cannot delete a request that is not his own
        // $validatedData = $request->validate([
        //     'user_to_delete_request_from' => ['required', 'string', 'exists:users,slug'],
        // ]);

        DB::table('place_requests')->where('id', $id)->delete();

        // $current_logged_in_user = auth()->user();
        // $user_to_send_request_to = User::where('slug', $validatedData['user_to_send_request_to'])->first();

        // // A Lister cannot send a request to another Lister
        // if($user_to_send_request_to->getAttributes()['type'] == UserType::LISTER && $current_logged_in_user->getAttributes()['type'] == UserType::LISTER){
        //     return redirect()->back()->with('error', 'There was a problem sending this place request');
        // }

        // // A user cannot send a request to an Admin user
        // if($user_to_send_request_to->getAttributes()['type'] == UserType::ADMIN){
        //     return redirect()->back()->with('error', 'There was a problem sending this place request');
        // }

        // // dd($user_to_send_request_to->getAttributes()['type']);
        // // dd($current_logged_in_user);
        // // store the new place request
        // if($request->has('place_request')){
        //     // dd('hit');
        //     auth()->user()->sentPlaceRequests()->attach($user_to_send_request_to->id, [
        //         'status' => PlaceRequestStatus::PENDING,
        //         'place_id' => auth()->user()->places()->first()->id,
        //     ]);


        //     // $user->roles()->attach($roleId, ['expires' => $expires]);
        //     return redirect()->back()->with('success', 'Your have successfully accepted the place request');
        // }

        // return redirect()->back()->with('error', 'There was a problem sending this place request');

        
        return redirect()->back()->with('success', 'The request has been deleted successfully');
    }
}
