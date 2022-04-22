<?php

namespace App\References;

class Gender
{
    const MALE = 1;
    const FEMALE = 2;
    const ALL = 3;

    /**
     * return list of gender and their labels
     * 
     * @return array
     */
    public static function genderList()
    {
        return [
            self::MALE => 'male',
            self::FEMALE => 'female',
            self::ALL => 'male or female'
        ];
    }

    public static function getName($value)
    {
        return [
            self::MALE => 'male',
            self::FEMALE => 'female',
            self::ALL => 'male or female'
        ][$value];
    }
}
