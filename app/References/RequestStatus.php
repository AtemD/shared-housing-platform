<?php 

namespace App\References;

class RequestStatus
{
    const ACCEPTED = 1;
    const REJECTED = 2;
    const PENDING = 3;

    /**
     * return list of request statuses and their labels
     * 
     * @return array
     */
     public static function requestStatusList()
     {
        return [
            self::ACCEPTED => 'Accepted',
            self::REJECTED => 'Rejected',
            self::PENDING => 'Pending'
        ];
     }

}