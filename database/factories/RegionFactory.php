<?php

namespace Database\Factories;

use App\References\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $region = $this->faker->word;
        return [
            'name' => 'region_' . $region,
            'acronym' => $region,
            'country' => Country::ETHIOPIA
        ];
    }
}
