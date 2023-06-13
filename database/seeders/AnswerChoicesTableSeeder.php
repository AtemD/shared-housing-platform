<?php

namespace Database\Seeders;

use App\Models\AnswerChoice;
use App\Models\CompatibilityQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('answer_choices')->truncate();

        // $compatibility_questions = CompatibilityQuestion::all();

        // $compatibility_questions->each(function($question) {
        //     AnswerChoice::factory()->times(mt_rand(2, 5))->create([
        //         'compatibility_question_id' => $question->id,
        //     ]);
        // });

        // $compatibility_questions = CompatibilityQuestion::firstOrFail();

        // // the answer choices for the compatibility questions
        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $compatibility_questions->id,
        //     'title' => 'very clean'
        // ]);

        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $compatibility_questions->id,
        //     'title' => 'average'
        // ]);

        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $compatibility_questions->id,
        //     'title' => 'very messy'
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
