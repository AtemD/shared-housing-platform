<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\User;
use App\References\RequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_id' => function () {
                return User::factory()->create()->id;
            },
            'receiver_id' => function () {
                return User::factory()->create()->id;
            },
            'Place_id' => function () {
                return Place::factory()->create()->id;
            },
            'status' => $this->faker->randomElement(array_keys(RequestStatus::requestStatusList())),
        ];
    }
}
