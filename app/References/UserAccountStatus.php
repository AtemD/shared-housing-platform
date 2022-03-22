<?php 

namespace App\References;

class UserAccountStatus
{
    const ACTIVATED = 1;
    const DEACTIVATED = 2;

    /**
     * return list of user account statuses and their labels
     * 
     * @return array
     */
     public static function userAccountStatusList()
     {
        return [
            self::ACTIVATED => 'activated',
            self::DEACTIVATED => 'deactivated'
        ];
     }

}