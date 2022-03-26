<?php

namespace Database\Factories;

use App\Models\User;
use App\References\SmokingHabit;
use App\References\AlcoholHabit;
use App\References\PartyingHabit;
use App\References\GuestHabit;
use App\References\OccupationType;
use App\References\MaritalStatus;
use App\References\DietHabit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalPreferenceFactory extends Factory
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
            'diet_habit' => $this->faker->randomElement(array_keys(DietHabit::dietHabitList())),
            'smoking_habit' => $this->faker->randomElement(array_keys(SmokingHabit::smokingHabitList())),
            'alcohol_habit' => $this->faker->randomElement(array_keys(AlcoholHabit::alcoholHabitList())),
            'partying_habit' => $this->faker->randomElement(array_keys(PartyingHabit::partyingHabitList())),
            'guest_habit' => $this->faker->randomElement(array_keys(GuestHabit::guestHabitList())),
            'occupation_type' => $this->faker->randomElement(array_keys(OccupationType::occupationTypeList())),
            'marital_status' => $this->faker->randomElement(array_keys(MaritalStatus::maritalStatusList())),
        ];
    }
}
