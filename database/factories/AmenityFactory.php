<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'amenity-'. $this->faker->word(),
        ];
    }
}
