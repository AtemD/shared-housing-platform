<?php

namespace App\Http\Controllers\User\ProfileSetup;

use App\Http\Controllers\Controller;
use App\Helpers\ProfileSetup;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interests = Interest::all();
        // dd($interests->toArray());

        return view('dashboard/user/profile-setup/interests/create', compact('interests'));
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
            'interests' => ['required', 'min:1', 'exists:interests,id'],
        ]);

        // Store the personal preferences in the session
        $request->session()->put('profile_setup.interests', [
            'interests' => $validatedData['interests'],
        ]);

        dd(session('profile_setup'));
        
        // auth()->user()->interests()->attach($validatedData['interests']);

        /**
         * Note: at the last step, push all session account setup information to the queue,
         * and redirect the user to homepage with success or information message that profile 
         * is being setup, and they will be notified when complete.
         */

        $next_step = ProfileSetup::determineNextStep();
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
    public function update(Request $request, $id)
    {
        //
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
