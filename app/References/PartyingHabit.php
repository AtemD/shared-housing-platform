<?php

namespace App\References;

class PartyingHabit
{
    const OCCASIONAL = 1;
    const FREQUENT = 2;
    const NONE = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
    public static function partyingHabitList()
    {
        return [
            self::OCCASIONAL => 'Occasionally',
            self::FREQUENT => 'Frequently',
            self::NONE => 'None'
        ];
    }

    public static function getName($value)
    {
        return [
            self::OCCASIONAL => 'Occasionally',
            self::FREQUENT => 'Frequently',
            self::NONE => 'None'
        ][$value];
    }
}
