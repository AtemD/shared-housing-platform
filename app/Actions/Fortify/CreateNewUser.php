<?php

namespace App\Actions\Fortify;

use App\References\UserAccountStatus;
use App\References\UserType;
use App\References\UserVerificationStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // dd($input);
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'user_type' => ['required', 'integer', Rule::in([UserType::LISTER, UserType::SEARCHER])],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'last_active' => now(),
            'verification_status' => UserVerificationStatus::UNVERIFIED,
            'account_status' => UserAccountStatus::ACTIVATED,
            'user_type' => $input['user_type'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
