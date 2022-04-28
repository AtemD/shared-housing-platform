<?php 

namespace App\References;

class PlaceRequestStatus
{
    const ACCEPTED = 1;
    const DECLINED = 2;
    const PENDING = 3;

    /**
     * return list of request statuses and their labels
     * 
     * @return array
     */
     public static function placeRequestStatusList()
     {
        return [
            self::ACCEPTED => 'Accepted',
            self::DECLINED => 'Declined',
            self::PENDING => 'Pending'
        ];
     }

}