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
            self::OCCASIONAL => 'Occasional',
            self::FREQUENT => 'Frequent',
            self::NONE => 'None'
        ];
    }

    public static function getName($value)
    {
        return [
            self::OCCASIONAL => 'Occasional',
            self::FREQUENT => 'Frequent',
            self::NONE => 'None'
        ][$value];
    }
}
