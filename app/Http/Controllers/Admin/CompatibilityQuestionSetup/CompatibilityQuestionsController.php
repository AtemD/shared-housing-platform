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

class CompatibilityQuestionsController extends Controller
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
        // use policy to check if the user is allowed to create a basic profile
        // $this->authorize('create', BasicProfile::class);
        
        return view('admin/compatibility-question-setup/question/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        // dd('hit str');
        // $this->authorize('create', BasicProfile::class);

        $validatedData = $request->validate([
            'verification_status' => ['required', 'integer', Rule::in(array_keys(VerificationStatus::verificationStatusList()))],
            'title' => ['required', 'max:1000'],
            'description' => ['required', 'max:1000'],
        ]);
// dd($request->toArray());
        // Store the validated data in the session
        $request->session()->put('compatibility_question_setup.question', [
            'verification_status' => $validatedData['verification_status'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

// dd($request->session()->get('compatibility_question_setup'));
        $next_step = AdminCompatibilityQuestionSetup::determineNextStep(AdminCompatibilityQuestionSetup::STEP_1);
        return redirect($next_step);
    }
}
