<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\References\UserType;
use App\References\UserAccountStatus;
use App\References\UserVerificationStatus;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'last_active'=> now(),
            'verification_status' => $this->faker->randomElement([UserVerificationStatus::VERIFIED, UserVerificationStatus::UNVERIFIED]),
            'account_status' => $this->faker->randomElement([UserAccountStatus::ACTIVATED , UserAccountStatus::DEACTIVATED]),
            'type' => $this->faker->randomElement([UserType::LISTER, UserType::SEARCHER]),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_profile_complete' => false,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
