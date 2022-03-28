<?php

namespace App\Http\Controllers\User\AccountSetup;

use App\Helpers\AccountSetup;
use App\References\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\BasicProfile;

class BasicProfileController extends Controller
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
        // First use the account controller to determine if the user is in the right step,
        // The account controller should determine which step is next.

        // The you can show the form, if this is the correct next step.
        // dd('hit bpc');

        // if ($request->session()->has('account_setup.basic_profile')) {
        //     // dd('has session');
        // }

        // use policy to check if the user is allowed to create a basic profile
        $this->authorize('create', BasicProfile::class);

        return view('dashboard/user/account-setup/basic-profile/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', BasicProfile::class);

        // Validate the request data
        $validatedData = $request->validate([
            'gender' => ['required', 'integer', Rule::in([Gender::MALE, Gender::FEMALE])],
            'dob' => ['required', 'date_format:Y-m-d'],
            'bio' => ['required', 'max:1000'],
        ]);

        // Store the validated data in the session
        $request->session()->put('account_setup.basic_profile', [
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'bio' => $validatedData['bio'],
        ]);

        $next_step = AccountSetup::determineNextStep();
        return redirect($next_step);
    }
}
