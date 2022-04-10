<?php 

namespace App\References;

class Country
{
    const ETHIOPIA = 1;

    /**
     * return list of countries and their labels
     * 
     * @return array
     */
     public static function countriesList()
     {
        return [
            self::ETHIOPIA => 'Ethiopia',
        ];
     }

}