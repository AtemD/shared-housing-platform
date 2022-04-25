<?php

namespace App\References;

class MaritalStatus
{
    const MARRIED = 1;
    const UNMARRIED = 2;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
    public static function MaritalStatusList()
    {
        return [
            self::MARRIED => 'Married',
            self::UNMARRIED => 'Unmarried'
        ];
    }

    public static function getName($value)
    {
        return [
            self::MARRIED => 'Married',
            self::UNMARRIED => 'Unmarried'
        ][$value];
    }
}
