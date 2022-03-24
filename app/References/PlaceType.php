<?php 

namespace App\References;

class PlaceType
{
    const PRIVATE_ROOM = 1;
    const SHARED_ROOM = 2;
    // const ENTIRE_PLACE = 3;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function placeTypeList()
     {
        return [
            self::PRIVATE_ROOM => 'Private Room',
            self::SHARED_ROOM => 'Shared Room'
        ];
     }

}