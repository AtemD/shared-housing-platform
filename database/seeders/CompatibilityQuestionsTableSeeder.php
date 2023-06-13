<?php

namespace Database\Seeders;

use App\Models\AnswerChoice;
use App\Models\CompatibilityQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompatibilityQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('compatibility_questions')->truncate();

        // CompatibilityQuestion::factory()->times(5)->create();

        // $question1 = CompatibilityQuestion::factory()->create([
        //     'title' => 'How clean are you?',
        //     'description' => 'this question tries to find out about your cleanliness habits'
        // ]);

        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $question1->id,
        //     'title' => 'very clean'
        // ]);
        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $question1->id,
        //     'title' => 'average'
        // ]);
        // AnswerChoice::factory()->create([
        //     'compatibility_question_id' => $question1->id,
        //     'title' => 'very messy'
        // ]);


        $question2 = CompatibilityQuestion::factory()->create([
            'title' => 'Are you looking to be close friends with you roommate, or do you prefer to keep your lives separate?',
            'description' => 'this question tries to find out about the type of roommate friendship you prefer'
        ]);

        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question2->id,
            'title' => 'looking for close friends'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question2->id,
            'title' => 'prefer to keep lives separate'
        ]);

        $question3 = CompatibilityQuestion::factory()->create([
            'title' => 'Do you tend to cook at home or eat out?',
            'description' => 'this question tries to find out if you prefer to cook at home or eat out'
        ]);

        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question3->id,
            'title' => 'cook at home'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question3->id,
            'title' => 'eat out'
        ]);

        $question4 = CompatibilityQuestion::factory()->create([
            'title' => 'Have you ever heard trouble paying rent on time?',
            'description' => 'this question tries to find out if you have ever heard difficulties paying rent on time'
        ]);

        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question4->id,
            'title' => 'yes'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question4->id,
            'title' => 'no'
        ]);

        $question5 = CompatibilityQuestion::factory()->create([
            'title' => 'Do you often listen to loud music?',
            'description' => 'this question tries to find out if you like to listen to loud music most of the time'
        ]);

        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question5->id,
            'title' => 'yes'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question5->id,
            'title' => 'no'
        ]);

        $question6 = CompatibilityQuestion::factory()->create([
            'title' => 'How religious are you?',
            'description' => 'this question tries to find out the level of you being religious'
        ]);

        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question6->id,
            'title' => 'very'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question6->id,
            'title' => 'moderate'
        ]);
        AnswerChoice::factory()->create([
            'compatibility_question_id' => $question6->id,
            'title' => 'none'
        ]);
        



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
