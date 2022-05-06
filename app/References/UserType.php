<?php

namespace App\References;

class UserType
{
    const LISTER = 1;
    const SEARCHER = 2;
    const ADMIN = 3;

    /**
     * return list of user types and their labels
     * 
     * @return array
     */
    public static function userTypeList()
    {
        return [
            self::LISTER => 'lister',
            self::SEARCHER => 'searcher',
            self::ADMIN => 'admin'
        ];
    }

    public static function getName($value)
    {
        return [
            self::LISTER => 'lister',
            self::SEARCHER => 'searcher',
            self::ADMIN => 'admin'
        ][$value];
    }
}
