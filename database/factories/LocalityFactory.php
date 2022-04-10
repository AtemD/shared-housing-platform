<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locality = $this->faker->word;
        return [
            'city_id' => function () {
                return City::factory()->create()->id;
            },
            'name' => 'locality_' . $locality,
            'acronym' => $locality,
        ];
    }
}
