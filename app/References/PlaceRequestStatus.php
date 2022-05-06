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
            self::ACCEPTED => 'accepted',
            self::DECLINED => 'declined',
            self::PENDING => 'pending'
        ];
     }

     public static function placeRequestStatusListInPresentTense()
     {
        return [
            self::ACCEPTED => 'accept',
            self::DECLINED => 'decline',
            self::PENDING => 'pending'
        ];
     }

     public static function getName($value)
    {
        return [
            self::ACCEPTED => 'accepted',
            self::DECLINED => 'declined',
            self::PENDING => 'pending'
        ][$value];
    }

    public static function getNameInPresentTense($value)
    {
        return [
            self::ACCEPTED => 'accept',
            self::DECLINED => 'decline',
            self::PENDING => 'pending'
        ][$value];
    }
}