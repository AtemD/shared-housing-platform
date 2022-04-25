<?php 

namespace App\References;

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
            self::VERIFIED => 'Verified',
            self::UNVERIFIED => 'Unverified'
        ];
     }

     /**
     * return the name of a specific constant, given the id
     * 
     * @return array
     */
    public static function getName($value)
    {
       return [
        self::VERIFIED => 'Verified',
        self::UNVERIFIED => 'Unverified'
       ][$value];
    }

}