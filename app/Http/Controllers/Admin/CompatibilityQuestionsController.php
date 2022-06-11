<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompatibilityQuestion;

class CompatibilityQuestionsController extends Controller
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
    public function index()
    {
        $compatibility_questions = CompatibilityQuestion::with('answerChoices')->latest()->simplePaginate();

        return view('admin/compatibility-questions/index', compact([
            'compatibility_questions',
        ]));
    }

    public function create()
    {
        return view('admin/compatibility-questions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // $user = User::create([
        //     'first_name' => $validatedData['first_name'],
        //     'last_name' => $validatedData['last_name'],
        //     'email' => $validatedData['email'],
        //     'password' => Hash::make($validatedData['password']),
        // ]);

        // return redirect()->route('admin.users.edit', ['user' => $user])->with('success', 'User Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        // return view('admin/users/edit', compact(
        //     'user'
        // ));
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
        // $validatedData = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
        // ]);

        // $user->update([
        //     'first_name' => $validatedData['first_name'],
        //     'last_name' => $validatedData['last_name'],
        //     'email' => $validatedData['email'],
        // ]);

        // return back()->with('success', 'User Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $this->authorize('delete', User::class);

        // $user->delete();

        // return back()->with('success', 'User Deleted Successfully');
    }
}
