<?php 

namespace App\References;

class ProfileStatus
{
    const INCOMPLETE = 1;
    const COMPLETE = 2;
    const PROCESSING = 3;

    /**
     * return list of account profile statuses and their labels
     * 
     * @return array
     */
     public static function ProfileStatusList()
     {
        return [
            self::INCOMPLETE => 'Incomplete',
            self::COMPLETE => 'Complete',
            self::PROCESSING => 'Processing'
        ];
     }

     public static function getName($value)
    {
        return [
            self::INCOMPLETE => 'Incomplete',
            self::COMPLETE => 'Complete',
            self::PROCESSING => 'Processing'
        ][$value];
    }

}