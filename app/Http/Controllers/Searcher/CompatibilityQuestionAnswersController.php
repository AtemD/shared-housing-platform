<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompatibilityQuestionAnswersController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        // *Needed validation: make sure that the question answer choices chosen are actually for the question
        $validatedData = $request->validate([
            "your_answer_question_{$request->question}" => ['required', 'integer'],
            "your_matches_answer_question_{$request->question}" => ['required', 'integer'],
            "importance_question_{$request->question}" => ['required', 'integer'],
        ]);

        auth()->user()->compatibilityQuestions()->attach($request->question, [
            'compatibility_question_relevance' => $validatedData["importance_question_{$request->question}"],
            'user_answer_id' => $validatedData["your_answer_question_{$request->question}"],
            'match_answer_id' => $validatedData["your_matches_answer_question_{$request->question}"]
        ]);

        // redirect back with a success message
        return redirect()->back()->with('success', 'Your answer has been submitted successfully.');
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
