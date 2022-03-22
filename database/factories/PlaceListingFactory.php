<?php

namespace Database\Factories;

use App\Models\User;
use App\References\PeriodType;
use App\References\FurnishingType;
use App\References\LivingPlaceType;
use App\References\Currency;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceListingFactory extends Factory
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
            'description' => $this->faker->text(400),
            'rent_amount' => $this->faker->randomElement([1000, 2000, 3000, 4000, 5000, 6000, 8000, 10000, 12000, 14000]),
            'rent_period' => $this->faker->randomElement(array_keys(PeriodType::periodTypeToDaysList())),
            'rent_currency' => $this->faker->randomElement(array_keys(Currency::currencyList())),
            'min_stay_period' => $this->faker->randomElement(array_keys(PeriodType::periodTypeToDaysList())),
            'profile_image' => $this->faker->randomElement([
                'place_1.jpg',
                'place_2.jpg',
                'place_3.jpg',
            ]),
            'living_place_type' => $this->faker->randomElement(array_keys(LivingPlaceType::livingPlaceTypeList())),
            'bills_included' => $this->faker->randomElement([true, false]),
            'move_in_date' => Carbon::parse($this->faker->dateTimeBetween('2022/01/01', '2022/12/31')),
            'furnishing_type' => $this->faker->randomElement(array_keys(FurnishingType::furnishingTypeList())),
        ];
    }
}
