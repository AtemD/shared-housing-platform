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
            self::OCCASIONAL => 'Occasionally Party',
            self::FREQUENT => 'Frequently Party',
            self::NONE => 'I Do Not Party'
        ];
     }

}