<?php

namespace Database\Factories;

use App\Models\BasicProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpokenLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lang = $this->faker->word;
        return [
            'basic_profile_id' => function () {
                return BasicProfile::factory()->create()->id;
            },
            'name' => 'lang_' . $lang,
        ];
    }
}
