<?php

namespace App\Jobs;

use App\Models\Place;
use App\Models\User;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

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
        // Consider doing a refactor, this handle function is too large.

        // Here we match user_A and user_B, 
        // consider using A and B to make the algo reusable
        // Also Note user_A is being matched with user_B, not the other way round 
        // Let user_A = Searcher
        // let user_B = Lister
        // We match the Searcher with Listers whose places match what the Searcher is looking for.

        // Start algo

        // 1. Get the place preferences of the searcher from the database
        $place_preferences = $this->user_A->placePreference()->firstOrFail();

        // 2. Retrieve all the preferred locations of the place preference and extract the city_id
        $city_id = $place_preferences->preferredLocations()->get()->pluck('city_id')[0];

        // 3. Using the Searchers place preference, obtain all the matching listed places together with their Listers
        $places = (new Place)->newQuery();
        $places = $places->whereBetween('rent_amount', [
            $place_preferences->getAttributes()['min_rent_amount'],
            $place_preferences->getAttributes()['max_rent_amount']
        ]);
        $places = $places->whereHas('placeLocation', function ($query) use ($city_id) {
            $query->where('city_id', $city_id);
        });
        $places = $places->with([
            'user.compatibilityQuestions', // user here is the lister of the place, i.e. the owner
        ])->get();

        // 4. Foreach place that matched, get the Lister and searchers compatibility questions

        // Searchers compatibility questions
        $user_A = $this->user_A->load('compatibilityQuestions');

        $places->each(function ($place) use (&$user_A) {
            // Get the eager loaded Lister of this place
            $user_B = $place->user;

            // Obtain all questions answered by user_A
            $user_A_compatibility_questions = $user_A->compatibilityQuestions->pluck('id');

            $user_B = $user_B->load([
                'compatibilityQuestions' => function ($query) use ($user_A_compatibility_questions) {
                    return $query->whereIn('compatibility_question_id', $user_A_compatibility_questions);
                }
            ]);

            // Obtain the set of common questions user A and B have
            $user_B_compatibility_questions = $user_B->compatibilityQuestions;
            $set_of_common_questions = $user_B_compatibility_questions->pluck('id'); // Note: User B now contains the set of common questions

            // If the set of common question is empty, no further processing,
            // Indicate the match percentage as zero, for user A matched with user B
            if ($set_of_common_questions->isEmpty()) {
                $total_match_percentage = 0;

                $match_record = $user_A->matches()->where('matched_user_id', $user_B->id)->first();

                if ($match_record == null) {
                    $user_A->matches()->attach(
                        $user_B->id,
                        ['compatibility_percentage' => $total_match_percentage, 'place_id' => $place->id]
                    );
                }

                if ($match_record != null) {
                    DB::table('matches')
                        ->where(['user_id' => $user_A->id, 'matched_user_id' => $user_B->id])
                        ->update([
                            'compatibility_percentage' => $total_match_percentage
                        ]);
                }
            }


            // If there is a set of common questions between the Lister and Searcher, then, do the calculation.
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
                $match_record = $user_A->matches()->where('matched_user_id', $user_B->id)->first();

                // If the record exists, check if the compatibility percentage needs an update
                if ($match_record != null) {
                    if ($total_match_percentage != $match_record->pivot->compatibility_percentage) {

                        DB::table('matches')
                            ->where(['user_id' => $user_A->id, 'matched_user_id' => $user_B->id])
                            ->update(['compatibility_percentage' => $total_match_percentage]);
                    }
                }

                // If the record does not exist, then create a new record
                if ($match_record == null) {
                    $user_A->matches()->attach(
                        $user_B->id,
                        ['compatibility_percentage' => $total_match_percentage, 'place_id' => $place->id]
                    );
                }
            }
        });
    }
}
