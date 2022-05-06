<?php

namespace App\Http\Controllers\Lister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpokenLanguage;

class SpokenLanguagesController extends Controller
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
        return view('lister/basic-profile/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lister/spoken-languages/create');
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
            'spoken_language' => ['required', 'string', 'max:255'],
        ]);

        $basic_profile = auth()->user()->basicProfile()->firstOrFail();
        $basic_profile->spokenLanguages()->create([
            'name' => $validatedData['spoken_language']
        ]);

        return redirect()->route('user.basic-profile.index')->with('success', 'Spoken Language Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpokenLanguage  $spoken_language
     * @return \Illuminate\Http\Response
     */
    public function edit(SpokenLanguage $spoken_language)
    {
        $spoken_language = $spoken_language->load('basicProfile');
        return view('lister/spoken-languages/edit', compact('spoken_language'));
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
     * @param  SpokenLanguage  $spoken_language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpokenLanguage  $spoken_language)
    {
        $validatedData = $request->validate([
            'spoken_language' => ['required', 'string', 'max:255'],
        ]);

        $spoken_language->update([
            'name' => $validatedData['spoken_language']
        ]);
    
        return back()->with('success', 'Your Spoken Language Information Has Been Updated Successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpokenLanguage  $spoken_language
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpokenLanguage  $spoken_language)
    {
        // make sure authorize the delete here

        $spoken_language->delete();
        return back()->with('success', 'Your Spoken Language Has Been Deleted Successfully');
    }
}
