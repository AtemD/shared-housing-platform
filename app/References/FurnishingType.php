<?php 

namespace App\References;

class FurnishingType
{
    const FULLY_FURNISHED = 1;
    const PARTIALLY_FURNISHED = 2;
    const NOT_FURNISHED = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function furnishingTypeList()
     {
        return [
            self::FULLY_FURNISHED => 'Fully Furnished',
            self::PARTIALLY_FURNISHED => 'Partially Furnished',
            self::NOT_FURNISHED => 'Not Furnished',
        ];
     }

}