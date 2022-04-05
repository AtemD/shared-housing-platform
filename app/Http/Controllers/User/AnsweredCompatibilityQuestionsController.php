<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompatibilityQuestion;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Database\Eloquent\Builder;

class AnsweredCompatibilityQuestionsController extends Controller
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
        $compatibility_questions = CompatibilityQuestion::whereHas('users', function(Builder $query){
            $query->where('user_id', auth()->user()->id);
        })
        ->with([
            'answerChoices',
            'users' => function($query) {
                $query->where('user_id', auth()->user()->id);
            }
        ])->paginate(10);

        $compatibility_question_importance = collect(CompatibilityQuestionRelevance::compatibilityQuestionRelevanceList());

        return view('dashboard/user/account-settings/compatibility-questions/answered/index', compact(
            'compatibility_questions',
            'compatibility_question_importance'
        ));
    }
}
