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

        $compatibility_questions = CompatibilityQuestion::all();
        
        $compatibility_questions->each(function($question) {
            AnswerChoice::factory()->times(mt_rand(2, 5))->create([
                'compatibility_question_id' => $question->id,
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
