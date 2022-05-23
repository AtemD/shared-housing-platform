<?php

namespace App\Jobs;

use App\Models\User;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MatchSearcherWithListersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_A;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_A)
    {
        $this->user_A = $user_A;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Here we match user A with user B
        // The compatibility matching algorithm
        $user_A = User::where('id', 1)->firstOrFail();
        $user_B = User::where('id', 2)->firstOrFail();

        // Obtain all questions answered by user_A
        $user_A = $user_A->load('compatibilityQuestions');
        $user_A_compatibility_questions = $user_A->compatibilityQuestions->pluck('id');

        $user_B = $user_B->load([
            'compatibilityQuestions' => function ($query) use ($user_A_compatibility_questions) {
                return $query->whereIn('compatibility_question_id', $user_A_compatibility_questions);
            }
        ]);

        // Obtain the set of common questions user A and B have
        $user_B_compatibility_questions = $user_B->compatibilityQuestions;
        $set_of_common_questions = $user_B_compatibility_questions->pluck('id'); // Note: User B now contains the set of common questions
        // dd($set_of_common_questions->isEmpty());
        // If the set of common question is empty, no further processing,
        // indicate the match percentage as zero, for user A matched with user B

        $user_A_total_question_weight = 0;
        $user_B_weight_score_of_user_A_total_question_weight = 0;
        $user_A_total_percentage_score = 0.00; // ***Warning, when calculating, prevent dividing by zero.

        $user_B_total_question_weight = 0;
        $user_A_weight_score_of_user_B_total_question_weight = 0;
        $user_B_total_percentage_score = 0.00;

        $total_match_percentage = 0.00;

        // set the total match percentage for both users to 0.00
        // if($set_of_common_questions->isEmpty()){
        //     calculateTotalMatchPercentage();
        // }

        // Note: We are matching user_A to user_B

        // Calculate how B satisfied A
        // ...that is how did B score on A questions
        $set_of_common_questions->each(function ($common_question_id) use (
            $user_A,
            $user_B,
            &$user_A_total_question_weight,
            &$user_B_total_question_weight,
            &$user_B_weight_score_of_user_A_total_question_weight,
            &$user_A_weight_score_of_user_B_total_question_weight
        ) {

            // 1. CALCULATE HOW USER_B SATISFIED USER_A (that is how User_B score on User_A's question).

            // First get the question, 
            $user_A_common_question = $user_A->compatibilityQuestions->find($common_question_id);
            $user_B_common_question = $user_B->compatibilityQuestions->find($common_question_id);

            // Calculate and store the questions total weight score
            $question_relevance_user_A = $user_A_common_question->pivot->compatibility_question_relevance;
            $question_relevance_user_B = $user_B_common_question->pivot->compatibility_question_relevance;
            $user_A_total_question_weight += CompatibilityQuestionRelevance::getRelevanceWeight($question_relevance_user_A);
            $user_B_total_question_weight += CompatibilityQuestionRelevance::getRelevanceWeight($question_relevance_user_B);

            // If A's match_answer_id == B's user_answer_id, then give B the weight score as B got it right
            if ($user_A_common_question->pivot->match_answer_id == $user_B_common_question->pivot->user_answer_id) {
                $relevance_A = $user_A_common_question->pivot->compatibility_question_relevance;
                $user_B_weight_score_of_user_A_total_question_weight += CompatibilityQuestionRelevance::getRelevanceWeight($relevance_A);
            }

            // 2. CALCULATE HOW USER_A SATISFIED USER_B (that is how User_A scored on User_A's question)
            if ($user_B_common_question->pivot->match_answer_id == $user_A_common_question->pivot->user_answer_id) {
                $relevance_B = $user_B_common_question->pivot->compatibility_question_relevance;
                $user_A_weight_score_of_user_B_total_question_weight += CompatibilityQuestionRelevance::getRelevanceWeight($relevance_B);
            }
        });

        // Calculate percentage scores for each user
        $user_A_total_percentage_score = ($user_B_weight_score_of_user_A_total_question_weight / $user_A_total_question_weight) * 100;
        $user_B_total_percentage_score = ($user_A_weight_score_of_user_B_total_question_weight / $user_B_total_question_weight) * 100;

        // Calculate the total match percentage for both users.
        $total_match_percentage = sqrt($user_A_total_percentage_score * $user_B_total_percentage_score);

        // Insert the match percentage in the database
        $this->user->compatibilityQuestion->attach();
        // $this->user->interests()->attach($this->interests);
    }
}
