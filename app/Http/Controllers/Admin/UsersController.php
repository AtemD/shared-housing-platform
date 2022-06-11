<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
// use App\Models\City;
// use App\Search\UserSearch;
use Illuminate\Http\Request;
// use App\Models\UserAccountStatus;
// use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\References\UserAccountStatus;
use App\References\UserVerificationStatus;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

// use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->simplePaginate();

        return view('admin/users/index', compact([
            'users',
        ]));
    }

    public function create()
    {
        $compatibility_questions = 'this';
        return view('admin/users/create', compact([
            'compatibility_questions',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('admin.users.edit', ['user' => $user])->with('success', 'User Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {  
        $account_statuses = UserAccountStatus::userAccountStatusList();
        $verification_statuses = UserVerificationStatus::userVerificationStatusList();
        // dd($account_statuses);
        // foreach($account_statuses as $key => $value){
        //     dd($key . '--' . $value);
        // }
        return view('admin/users/edit', compact(
            'user',
            'account_statuses',
            'verification_statuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->has('update_account_status')){
            $validatedData = $request->validate([
                'account_status' => ['required', 'integer', Rule::in(array_keys(UserAccountStatus::userAccountStatusList()))],
            ]);

            $user->update([
                'account_status' => $validatedData['account_status'],
            ]);

            return redirect()->back()->with('success', 'Your have successfully Updated the Users Account Status');
        }

        if($request->has('update_verification_status')){
            $validatedData = $request->validate([
                'verification_status' => ['required', 'integer', Rule::in(array_keys(UserVerificationStatus::userVerificationStatusList()))],
            ]);

            $user->update([
                'verification_status' => $validatedData['verification_status'],
            ]);

            return redirect()->back()->with('success', 'Your have successfully Updated the Users Verification Status');
        }

        return back()->with('error', 'There was a problem with the udpate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return back()->with('success', 'User Deleted Successfully');
    }
}
