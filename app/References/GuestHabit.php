<?php 

namespace App\References;

class GuestHabit
{
    const OCCASIONAL = 1;
    const FREQUENT = 2;
    const NONE = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function GuestHabitList()
     {
        return [
            self::OCCASIONAL => 'Occasionally invite Guests',
            self::FREQUENT => 'Frequently invite Guests',
            self::NONE => 'I Do Not invite Guests'
        ];
     }

}