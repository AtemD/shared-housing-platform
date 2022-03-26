<?php 

namespace App\References;

class AlcoholHabit
{
    const OCCASIONAL = 1;
    const FREQUENT = 2;
    const NONE = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function alcoholHabitList()
     {
        return [
            self::OCCASIONAL => 'Occasional Drinker',
            self::FREQUENT => 'Frequent Drinker',
            self::NONE => 'Not a Drinker'
        ];
     }

}