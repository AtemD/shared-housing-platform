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
        // use policy to check if the user is allowed to create a basic profile
        // $this->authorize('create', BasicProfile::class);
        // dd(session('compatibility_question_setup.answer'));
        // foreach(session('compatibility_question_setup.answer') as $choice){
        //     dd($choice['title']);
        // }
        
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
        // dd($request->toArray());
        // dd('hit str a');
        // $this->authorize('create', BasicProfile::class);

        $validatedData = $request->validate([
            'title' => ['required', 'max:1000'],
        ]);
// dd($request->toArray());
        // Store the validated data in the session
        $request->session()->push('compatibility_question_setup.answer', [
            'title' => $validatedData['title'],
        ]);

        if($request->has('add_another_choice')){
            return redirect()->back();
        }

// dd($request->session()->get('compatibility_question_setup'));
        $next_step = AdminCompatibilityQuestionSetup::determineNextStep(AdminCompatibilityQuestionSetup::STEP_LAST);
        return redirect($next_step);
    }

    public function destroy($id)
    {
        dd($id);
        
        dd('hit');
        // get the id of the question in the session
        // then, delete the question from the session
        // then, redirect back to the answers page or url


        // $this->authorize('delete', User::class);

        // $user->delete();

        // return back()->with('success', 'User Deleted Successfully');
    }
}
