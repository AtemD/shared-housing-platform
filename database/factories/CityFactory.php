<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $city = $this->faker->word;
        return [
            'region_id' => function () {
                return Region::factory()->create()->id;
            },
            'name' => 'city_' . $city,
            'acronym' => $city,
        ];
    }
}
