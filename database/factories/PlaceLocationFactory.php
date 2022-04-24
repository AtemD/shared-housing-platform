<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Locality;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'place_id' => function () {
                return Place::factory()->create()->id;
            },
            'city_id' => function () {
                return City::factory()->create()->id;
            },
            'locality_id' => function () {
                return Locality::factory()->create()->id;
            },
            'street' => $this->faker->streetName,
            'specific_information' => $this->faker->sentence,
            'address' => $this->faker->address,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
        ];
    }
}
