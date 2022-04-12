<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use App\References\PeriodType;
use App\References\FurnishingType;
use App\References\PlaceType;
use App\References\Currency;
use App\References\ProfileStatus;
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
            'featured_image_id' => function () {
                return Image::factory()->create()->id;
            },
            'place_type' => $this->faker->randomElement(array_keys(PlaceType::placeTypeList())),
            'bills_included' => $this->faker->randomElement([true, false]),
            'availability_date' => Carbon::parse($this->faker->dateTimeBetween('2022/01/01', '2022/12/31')),
            'furnishing_type' => $this->faker->randomElement(array_keys(FurnishingType::furnishingTypeList())),
            'profile_status' => $this->faker->randomElement(array_keys(ProfileStatus::ProfileStatusList())),
        ];
    }
}
