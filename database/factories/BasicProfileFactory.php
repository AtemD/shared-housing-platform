<?php

namespace Database\Factories;

use App\Models\User;
use App\References\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

class BasicProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'gender' => $this->faker->randomElement([Gender::FEMALE, Gender::MALE]),
            // 'dob' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
            'dob' => Carbon::parse($this->faker->dateTimeBetween('1990/01/01', '2012/12/31')),
            'bio' => $this->faker->text(300),
        ];
    }
}
