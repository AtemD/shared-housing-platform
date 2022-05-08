<?php

namespace App\References;

class VerificationStatus
{
    const VERIFIED = 1;
    const UNVERIFIED = 2;
    const PENDING = 3;

    /**
     * return list of verification statuses and their labels
     * 
     * @return array
     */
    public static function verificationStatusList()
    {
        return [
            self::VERIFIED => 'verified',
            self::UNVERIFIED => 'unverified',
            self::PENDING => 'pending'
        ];
    }

    public static function getName($value)
    {
        return [
            self::VERIFIED => 'verified',
            self::UNVERIFIED => 'unverified',
            self::PENDING => 'pending'
        ][$value];
    }
}
