<?php

namespace App\Helpers;

use App\Models\CompatibilityQuestion;
use Illuminate\Support\Facades\DB;

class AdminCompatibilityQuestionSetup
{
    // profile setup steps
    const STEP_START = "start";
    const STEP_1     = "questions";
    const STEP_2     = "answers";
    const STEP_LAST  = "last";

    /**
     * determine next step
     * 
     * @return array
     */
    public static function determineNextStep($current_step = self::STEP_START)
    {
        if ($current_step == self::STEP_START) {
            $next_step_url = route('admin.compatibility-question-setup.question.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_1) {
            $next_step_url = route('admin.compatibility-question-setup.answer.create');
            return $next_step_url;
        }

        // The final step 
        if ($current_step == self::STEP_LAST) {
            // First determine that all steps form data is in the session
            if (!self::isPlaceSetupInfoComplete()) {
                // dd(session('place_setup'));
                session()->flash('warning', 'You missed some steps, please try again!');
                $next_step_url = route('admin.compatibility-question-setup.question.create');
                return $next_step_url;
            }

            DB::transaction(function () {
                $compatibility_question = CompatibilityQuestion::create([
                    'title' => session('compatibility_question_setup.question.title'),
                    'description' => session('compatibility_question_setup.question.description'),
                    'verification_status' => session('compatibility_question_setup.question.verification_status'),
                ]);

                $answer_choices = array_values(session('compatibility_question_setup.answer'));
                $compatibility_question->answerChoices()->createMany($answer_choices);
            }, 3);

            // clear the session.
            session()->forget('compatibility_question_setup');
            
            $next_step_url = route('admin.compatibility-questions.index');
            session()->flash('success', 'Compatibility Question with Answers Added Successfully');
            return $next_step_url;
        }

        $next_step_url = route('admin.compatibility-questions.index');
        session()->flash('error', 'Question Setup Failed');
        return $next_step_url;
    }

    public static function isPlaceSetupInfoComplete()
    {
        if (!session()->has('compatibility_question_setup.question')) {
            return false;
        }

        if ((!session()->has('compatibility_question_setup.answer'))) {
            return false;
        }

        return true;
    }
}
