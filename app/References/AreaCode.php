<?php 

namespace App\References;

class AreaCode
{
    const ETHIOPIA = '+251';

    /**
     * return list of user account statuses and their labels
     * 
     * @return array
     */
     public static function areaCodeList()
     {
        return [
            'ethiopia' => self::ETHIOPIA,
        ];
     }

}