<?php

namespace App\Http\Controllers\User\AccountSetup;

use App\References\Gender;
use Illuminate\Http\Request;
use App\References\UserType;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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

        if ($request->session()->has('account_setup.basic_profile')) {
            // dd('has session');
        }

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
        // dd(auth()->user()->id);
        // First use the account controller to determine if the user is in the right step,
        // The account controller should determine which step is next.

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

        
        // dd($request->session('account_setup.basic_profile'));

        $user_type = auth()->user()->type;

        if ($user_type == UserType::LISTER) {
            // dd('hit l');
            return redirect()->route('user.account-setup.place-listings.create');
        }

        if ($user_type == UserType::SEARCHER) {
            // dd('hit s');
            return redirect()->route('user.account-setup.place-listing-preferences.create');
        }

        return redirect()->route('welcome');
    }
}
