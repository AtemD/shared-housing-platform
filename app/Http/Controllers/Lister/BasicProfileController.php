<?php

namespace App\Http\Controllers\Lister;

use App\Helpers\ProfileSetup;
use App\References\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\BasicProfile;

class BasicProfileController extends Controller
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
        // $basic_profile = auth()->user()->basicProfile()->firstOrFail();
        $user = auth()->user()->load([
            'basicProfile.occupations',
            'basicProfile.spokenLanguages'
        ]);
        // dd($user->basicProfile->toArray());
        // dd($user->occupations->first()->toArray());
        return view('lister/basic-profile/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // use policy to check if the user is allowed to create a basic profile
        $this->authorize('create', BasicProfile::class);

        return view('lister/basic-profile/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', BasicProfile::class);

        // Validate the request data
        $validatedData = $request->validate([
            'gender' => ['required', 'integer', Rule::in(array_keys(Gender::genderList()))],
            'dob' => ['required', 'date_format:Y-m-d'],
            'bio' => ['required', 'max:1000'],
        ]);

        // Store the validated data in the session
        $request->session()->put('profile_setup.basic_profile', [
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'bio' => $validatedData['bio'],
        ]);

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_1);
        return redirect($next_step);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicProfile  $basic_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicProfile $basic_profile)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  BasicProfile  $basic_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicProfile  $basic_profile)
    {
        $this->authorize('update', $basic_profile);

        $validatedData = $request->validate([
            'gender' => ['required', 'integer', Rule::in(array_keys(Gender::genderList()))],
            'dob' => ['required', 'date_format:Y-m-d'],
            'bio' => ['required', 'max:1000'],
        ]);

        $basic_profile->update([
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'bio' => $validatedData['bio'],
        ]);
    
        return back()->with('success', 'Your Basic Profile Information Has Updated Successfully');
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
