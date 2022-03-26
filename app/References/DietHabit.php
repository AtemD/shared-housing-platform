<?php 

namespace App\References;

class DietHabit
{
    const VEGETARIAN = 1;
    const NON_VEGETARIAN = 2;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function dietHabitList()
     {
        return [
            self::VEGETARIAN => 'Vegetarian',
            self::NON_VEGETARIAN => 'Non-Vegetarian'
        ];
     }

}