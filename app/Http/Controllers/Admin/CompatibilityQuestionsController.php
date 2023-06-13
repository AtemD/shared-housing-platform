<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompatibilityQuestion;
use App\References\VerificationStatus;
use Illuminate\Validation\Rule;

class CompatibilityQuestionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compatibility_questions = CompatibilityQuestion::with('answerChoices')->latest()->simplePaginate();

        return view('admin/compatibility-questions/index', compact([
            'compatibility_questions',
        ]));
    }

    public function create()
    {
        return view('admin/compatibility-questions/create');
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
            'verification_status' => ['required', 'integer', Rule::in(array_keys(VerificationStatus::verificationStatusList()))],
            'title' => ['required', 'max:1000'],
            'description' => ['required', 'max:1000'],
        ]);

        $compatibility_question = CompatibilityQuestion::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'verification_status' => $validatedData['verification_status'],
        ]);

        return redirect()->route('admin.compatibility-questions.index')->with('success', 'Compatibility Question Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(CompatibilityQuestion $compatibility_question)
    {   
        // dd($compatibility_question->toArray());
        $compatibility_question = $compatibility_question->load('answerChoices');
        $verification_statuses = VerificationStatus::verificationStatusList();
        return view('admin/compatibility-questions/edit', compact(
            'compatibility_question',
            'verification_statuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompatibilityQuestion $compatibility_question)
    {
        $validatedData = $request->validate([
            'verification_status' => ['required', 'integer', Rule::in(array_keys(VerificationStatus::verificationStatusList()))],
            'title' => ['required', 'max:1000'],
            'description' => ['required', 'max:1000'],
        ]);

        $compatibility_question->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'verification_status' => $validatedData['verification_status'],
        ]);

        return back()->with('success', 'Compatibility Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompatibilityQuestion $compatibility_question
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompatibilityQuestion $compatibility_question)
    {
        // after implementing roles and permissions, you can do the authorize check
        // $this->authorize('delete', CompatibilityQuestion::class);

        $compatibility_question->delete();

        return back()->with('success', 'Compatibility Question Deleted Successfully');
    }
}
