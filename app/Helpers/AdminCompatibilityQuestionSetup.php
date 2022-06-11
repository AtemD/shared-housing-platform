<?php

namespace App\Helpers;

use App\Models\CompatibilityQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;

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
        if ($current_step == self::STEP_START) 
        {
            $next_step_url = route('admin.compatibility-question-setup.question.create');
            return $next_step_url;
        }

        if ($current_step == self::STEP_1) 
        {
            $next_step_url = route('admin.compatibility-question-setup.answer.create');
            return $next_step_url;
        }

        // The final step 
        if ($current_step == self::STEP_LAST) {
            // First determine that all steps form data is in the session
            dd('hit last step');
            if (!self::isPlaceSetupInfoComplete()) 
            {
                // dd(session('place_setup'));
                session()->flash('warning', 'You missed some steps, please try again!');
                $next_step_url = route('admin.compatibility-question-setup.question.create');
                return $next_step_url;
            }


            if(session('compatibility_question_setup.answer')){
                dd(session('compatibility_question_setup'));
            }

            return redirect()->route('admin.compatibility-questions.index')->with('success', 'Compatibility Question Added Successfully');

            // clear the session.
            // session()->forget('place_setup');

            // If the user has not answered any compatibility questions, redirect them to that page.
            // $question = auth()->user()->compatibilityQuestions()->first();

            // if($question == null){
            //     $next_step_url = route('lister.compatibility-questions.unanswered.index');
            //     session()->flash('success', 'Your place registration is currently being processed, please answer at some questions to be matched');
            //     return $next_step_url;
            // } else{
            //     $next_step_url = route('lister.places.index');
            //     session()->flash('success', 'Your place registration is currently being processed, you will be notified when complete.');
            //     return $next_step_url;
            // }
        }
    }

    public static function isPlaceSetupInfoComplete()
    {
        if (!session()->has('compatibility_question.question')) 
        {
            return false;
        }

        if ((!session()->has('compatibility_question.answer'))) 
        {
            return false;
        }

        return true;
    }
}
