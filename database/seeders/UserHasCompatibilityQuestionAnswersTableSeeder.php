<?php

namespace Database\Seeders;

use App\Models\AnswerChoice;
use App\Models\CompatibilityQuestion;
use App\Models\User;
use App\References\CompatibilityQuestionRelevance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasCompatibilityQuestionAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_has_compatibility_question_answers')->truncate();

        // Obtain all non admin users
        // Obtain all questions
        // for each user, select an answers for each question, store the users chosen answer

        $users = User::all();
        $questions = CompatibilityQuestion::with('answerChoices')->get();

        $users->each(function ($user) use ($questions) {
            $questions = $questions->random(mt_rand(1, 3));
            $answer_choices = [];
            $questions->each(function ($question) use (&$answer_choices) {
                $question_array = $question->toArray();
                $question_array_answer_choices = $question_array['answer_choices'];
                $answer_choices_count = count($question_array_answer_choices);

                $user_answer_choice = $question_array_answer_choices[mt_rand(0, $answer_choices_count - 1)];
                $match_answer_choice = $question_array_answer_choices[mt_rand(0, $answer_choices_count - 1)];

                $answer_choices[$user_answer_choice['id']] = [
                    'compatibility_question_id' => $question->id,
                    'match_answer_id' => $match_answer_choice['id'],
                    'compatibility_question_relevance' => [
                        CompatibilityQuestionRelevance::IRRELEVANT,
                        CompatibilityQuestionRelevance::RELEVANT,
                        CompatibilityQuestionRelevance::MANDATORY
                    ][mt_rand(0, 2)]
                ];
            });
            
            $user->answerChoices()->attach($answer_choices);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
