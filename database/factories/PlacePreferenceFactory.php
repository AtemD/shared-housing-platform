<?php

namespace Database\Factories;

use App\Models\User;
use App\References\PeriodType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlacePreferenceFactory extends Factory
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
            'min_rent_amount' => $this->faker->randomElement([1000, 2000, 3000]),
            'max_rent_amount' => $this->faker->randomElement([4000, 5000]),
            'rent_period'=> $this->faker->randomElement(['30']),
            // 'rent_period'=> $this->faker->randomElement(array_keys(PeriodType::periodTypeToDaysList())),
            'availability_date' => Carbon::parse($this->faker->dateTimeBetween('2022/01/01', '2022/12/31')),
        ];
    }
}
