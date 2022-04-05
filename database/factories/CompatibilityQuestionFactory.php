<?php

namespace Database\Factories;

use App\References\VerificationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompatibilityQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 12, $variableNbWord = true),
            'description' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = true),
            'verification_status' => $this->faker->randomElement(array_keys(VerificationStatus::verificationStatusList())),
        ];
    }
}
