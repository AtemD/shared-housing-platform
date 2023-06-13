<?php

namespace App\Http\Controllers\Lister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Occupation;

class OccupationsController extends Controller
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
        $user = auth()->user()->load('basicProfile.occupations');
        // dd($user->basicProfile->occupations->toArray());
        // dd($user->occupations->first()->toArray());
        return view('lister/basic-profile/occupation/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lister/occupations/create');
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
            'occupation' => ['required', 'string', 'max:255'],
        ]);

        $basic_profile = auth()->user()->basicProfile()->firstOrFail();
        $basic_profile->occupations()->create([
            'name' => $validatedData['occupation']
        ]);

        return redirect()->route('lister.basic-profile.index')->with('success', 'Occupation Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicProfile  $basic_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        $occupation = $occupation->load('basicProfile');
        return view('lister/occupations/edit', compact('occupation'));
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
     * @param  Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation  $occupation)
    {
        $validatedData = $request->validate([
            'occupation' => ['required', 'string', 'max:255'],
        ]);

        $occupation->update([
            'name' => $validatedData['occupation']
        ]);
    
        return back()->with('success', 'Your Occupation Information Has Been Updated Successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        // make sure authorize the delete here

        $occupation->delete();
        return back()->with('success', 'Your Occupation Has Been Deleted Successfully');
    }
}
