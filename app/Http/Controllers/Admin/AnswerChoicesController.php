<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnswerChoice;
use App\Models\CompatibilityQuestion;
use App\Models\Occupation;

class AnswerChoicesController extends Controller
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
        // $user = auth()->user()->load('basicProfile.occupations');
        // dd($user->basicProfile->occupations->toArray());
        // dd($user->occupations->first()->toArray());
        // return view('admin/answer-choices/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $compatibility_question = CompatibilityQuestion::where('id', $request->question_id)->firstOrFail();
        // dd($request->toArray());
        // dd($compatibility_question->toArray());
        return view('admin/answer-choices/create', compact('compatibility_question'));
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
            'title' => ['required', 'string', 'max:255'],
            'compatibility_question_id' => ['required', 'integer']
        ]);

        $compatibility_question = CompatibilityQuestion::where('id', $request->compatibility_question_id)->firstOrFail();

        $compatibility_question->answerChoices()->createMany([
            ['title' => $validatedData['title']]
        ]);


        return redirect()->route('admin.compatibility-questions.edit', ['compatibility_question' => $compatibility_question])
        ->with('success', 'Answer Choice Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicProfile  $basic_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(AnswerChoice $answer_choice)
    {
        // dd('answ ch edit');
        $answer_choice = $answer_choice->load('compatibilityQuestion');
        return view('admin/answer-choices/edit', compact('answer_choice'));
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
     * @param  AnswerChoice $answer_choice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnswerChoice $answer_choice)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $answer_choice->update([
            'title' => $validatedData['title']
        ]);
    
        return back()->with('success', 'Answer Choice Information Has Been Updated Successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnswerChoice $answer_choice
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnswerChoice $answer_choice)
    {
        // make sure authorize the delete here

        $answer_choice->delete();
        return back()->with('success', 'Answer Choice Has Been Deleted Successfully');
    }
}
