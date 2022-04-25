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
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::ALL => 'Male or Female'
        ];
    }

    public static function getName($value)
    {
        return [
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::ALL => 'Male or Female'
        ][$value];
    }
}
