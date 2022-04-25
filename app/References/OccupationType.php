<?php

namespace App\References;

class OccupationType
{
    const WORKING_PROFESSIONAL = 1;
    const STUDENT = 2;
    const WORKING_STUDENT = 3;
    const OTHERS = 4;
    // const ENTREPRENEUR = 4; // or self_employed
    // working professional, student, undergraduate student, graduate student

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
    public static function occupationTypeList()
    {
        return [
            self::WORKING_PROFESSIONAL => 'Working Professional',
            self::STUDENT => 'Student',
            self::WORKING_STUDENT => 'Working Student',
            self::OTHERS => 'Others',
        ];
    }

    public static function getName($value)
    {
        return [
            self::WORKING_PROFESSIONAL => 'Working Professional',
            self::STUDENT => 'Student',
            self::WORKING_STUDENT => 'Working Student',
            self::OTHERS => 'Others',
        ][$value];
    }
}
