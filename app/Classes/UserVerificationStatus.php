<?php 

namespace App\Classes;

class UserVerificationStatus
{
    const VERIFIED = 1;
    const UNVERIFIED = 2;

    /**
     * return list of user verification statuses and their labels
     * 
     * @return array
     */
     public static function userVerificationStatusList()
     {
        return [
            self::VERIFIED => 'verified',
            self::UNVERIFIED => 'unverified'
        ];
     }

}