<?php

namespace Database\Factories;

use App\Models\BasicProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class OccupationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $occupation = $this->faker->word;
        return [
            'basic_profile_id' => function () {
                return BasicProfile::factory()->create()->id;
            },
            'name' => 'occupation_' . $occupation,
        ];
    }
}
