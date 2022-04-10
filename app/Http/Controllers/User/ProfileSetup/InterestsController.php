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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interests = Interest::all();
        return view('user/profile-setup/interests/create', compact('interests'));
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
        $request->session()->put('profile_setup.interests', 
            $validatedData['interests']
        );

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_5);
        return redirect($next_step);
    }
}
