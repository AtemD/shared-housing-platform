<?php

namespace App\Jobs;

use App\Models\User;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateMatchesCompatibilityPercentageJob implements ShouldQueue
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
        $user_A = $this->user_A->load('compatibilityQuestions');

        // Retrieve all the users that matched the current user
        $users_to_update = User::whereHas(
            'matches',
            function (Builder $query) use ($user_A) {
                return $query->where('matched_user_id', $user_A->id);
            }
        )->get();

        if (!$users_to_update->isEmpty()) {
            $users_to_update->each(function ($user_B) use ($user_A) {

                // Here we are updating user_B compatibility percentage where matched user_id = $user_A->id 

                // First we have to recalculate the match percentages for both users
                $user_A = $user_A->load('compatibilityQuestions');
                // Obtain all questions answered by user_A
                $user_A_compatibility_questions = collect($user_A->compatibilityQuestions->pluck('id'));

                $set_of_common_questions = collect();

                // If user_A compatibility questions is not empty, then proceed
                if (!$user_A->compatibilityQuestions->isEmpty()) {
                    $user_B = $user_B->load([
                        'compatibilityQuestions' => function ($query) use ($user_A_compatibility_questions) {
                            return $query->whereIn('compatibility_question_id', $user_A_compatibility_questions);
                        }
                    ]);

                    // Obtain the set of common questions user A and B have
                    $user_B_compatibility_questions = $user_B->compatibilityQuestions;
                    $set_of_common_questions = collect($user_B_compatibility_questions->pluck('id')); // Note: User B now contains the set of common questions

                    // If the set of common questions is not empty, then, do the calculation and update the user_B percentage
                    if (!$set_of_common_questions->isEmpty()) {
                        $user_A_total_question_weight = 0;
                        $user_B_weight_score_of_user_A_total_question_weight = 0;
                        $user_A_total_percentage_score = 0.00; // ***Warning, when calculating, prevent dividing by zero.

                        $user_B_total_question_weight = 0;
                        $user_A_weight_score_of_user_B_total_question_weight = 0;
                        $user_B_total_percentage_score = 0.00;

                        $total_match_percentage = 0.00;
                        // Calculate the scores and weight
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

                        // Calculate percentage scores for each 
                        // Make sure not to divide by zero
                        $user_A_total_percentage_score = $user_A_total_question_weight == 0 ? 0 : ($user_B_weight_score_of_user_A_total_question_weight / $user_A_total_question_weight) * 100;
                        $user_B_total_percentage_score = $user_B_total_question_weight == 0 ? 0 : ($user_A_weight_score_of_user_B_total_question_weight / $user_B_total_question_weight) * 100;

                        // Calculate the total match percentage for both users.
                        $total_match_percentage = sqrt($user_A_total_percentage_score * $user_B_total_percentage_score);

                        // Insert the match percentage in the database

                        // First check if the record exists, to avoid duplicate entry database error

                        // THE USER_B WHO WAS MATCHED TO USER_A NEEDS TO BE UPDATED
                        $match_record = $user_B->matches()->where('matched_user_id', $user_A->id)->first();

                        // If the record exists, check if the compatibility percentage needs an update
                        if ($match_record != null) {
                            if ($total_match_percentage != $match_record->pivot->compatibility_percentage) {

                                DB::table('matches')
                                    ->where(['user_id' => $user_B->id, 'matched_user_id' => $user_A->id])
                                    ->update(['compatibility_percentage' => $total_match_percentage]);
                            }
                        }

                        // If the record does not exist, then do nothing
                    }
                }
            });
        }
    }
}
