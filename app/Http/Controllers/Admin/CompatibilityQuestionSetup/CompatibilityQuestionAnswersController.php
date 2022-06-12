<?php

namespace App\Http\Controllers\Admin\CompatibilityQuestionSetup;

use App\Helpers\AdminCompatibilityQuestionSetup;
use App\Helpers\ProfileSetup;
use App\References\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\BasicProfile;
use App\References\VerificationStatus;

class CompatibilityQuestionAnswersController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(array_values(session('compatibility_question_setup.answer')));

        return view('admin/compatibility-question-setup/answers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('submit')) {
            $validatedData = $request->validate([
                'title' => ['required', 'max:1000'],
            ]);


            // Store the validated data in the session
            $request->session()->push('compatibility_question_setup.answer', [
                'title' => $validatedData['title'],
            ]);

            if ($request->has('add_another_choice')) {
                return redirect()->back();
            }
        }

        $next_step = AdminCompatibilityQuestionSetup::determineNextStep(AdminCompatibilityQuestionSetup::STEP_LAST);
        return redirect($next_step);
    }

    public function destroy(Request $request, $id)
    {
        $request->session()->forget('compatibility_question_setup.answer.' . $id);
        return back()->with('success', 'Answer Choice Deleted Successfully');
    }
}
