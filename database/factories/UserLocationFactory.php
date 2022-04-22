<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Locality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLocationFactory extends Factory
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
            'city_id' => function () {
                return City::factory()->create()->id;
            },
            'locality_id' => function () {
                return Locality::factory()->create()->id;
            },
        ];
    }
}
