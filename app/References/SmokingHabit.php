<?php 

namespace App\References;

class SmokingHabit
{
    const OCCASIONAL = 1;
    const FREQUENT = 2;
    const NONE = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function smokingHabitList()
     {
        return [
            self::OCCASIONAL => 'Occasional Smoker',
            self::FREQUENT => 'Frequent Smoker',
            self::NONE => 'Not a Smoker'
        ];
     }

}