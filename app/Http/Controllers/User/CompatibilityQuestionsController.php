<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompatibilityQuestion;
use App\References\CompatibilityQuestionRelevance;

class CompatibilityQuestionsController extends Controller
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
        $compatibility_questions = CompatibilityQuestion::with([
            'answerChoices',
            'users' => function($query) {
                $query->where('user_id', auth()->user()->id);
            }
        ])->paginate(10);

        $compatibility_question_importance = collect(CompatibilityQuestionRelevance::compatibilityQuestionRelevanceList());

        return view('dashboard/user/account-settings/compatibility-questions/index', compact(
            'compatibility_questions',
            'compatibility_question_importance'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the current authenticated user
        $user = auth()->user();

        return view('dashboard/user/basic-profile/create', compact(
            'user'
        ));
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
     * @param  CompatibilityQuestion  $compatibility_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompatibilityQuestion  $compatibility_question)
    {
        $validatedData = $request->validate([
            "your_answer_question_{$request->question}" => ['required', 'integer'],
            "your_matches_answer_question_{$request->question}" => ['required', 'integer'],
            "importance_question_{$request->question}" => ['required', 'integer'],
        ]);

        auth()->user()->compatibilityQuestions()->updateExistingPivot($request->question, [
            'compatibility_question_relevance' => $validatedData["importance_question_{$request->question}"],
            'user_answer_id' => $validatedData["your_answer_question_{$request->question}"],
            'match_answer_id' => $validatedData["your_matches_answer_question_{$request->question}"]
        ]);

        // Notify the user about this activity.
        // the account number, the user name, the amount deposited, the time it was deposited


        return back()->with('success', 'Question answer updated successfully');
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
