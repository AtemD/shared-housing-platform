<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Locality;
use App\Models\PlacePreference;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlacePreferenceLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'place_preference_id' => function () {
                return PlacePreference::factory()->create()->id;
            },
            'city_id' => function () {
                return City::factory()->create()->id;
            },
            'locality_id' => function () {
                return Locality::factory()->create()->id;
            },
        ];
    }
}
