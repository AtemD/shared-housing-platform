<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Models\CompatibilityQuestion;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Database\Eloquent\Builder;

class UnansweredCompatibilityQuestionsController extends Controller
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
        // Get all the unanswered question by the currently authenticated user
        $compatibility_questions = CompatibilityQuestion::whereDoesntHave('users', function(Builder $query){
            $query->where('user_id', auth()->user()->id);
        })
        ->with([
            'answerChoices'
        ])->paginate(10);

        $compatibility_question_importance = collect(CompatibilityQuestionRelevance::compatibilityQuestionRelevanceList());

        return view('searcher/compatibility-questions/unanswered/index', compact(
            'compatibility_questions',
            'compatibility_question_importance'
        ));
    }
}
