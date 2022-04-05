<?php

namespace Database\Factories;

use App\Models\CompatibilityQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'compatibility_question_id' => function () {
                return CompatibilityQuestion::factory()->create()->id;
            },
            'title' => $this->faker->text(20)
        ];
    }
}
