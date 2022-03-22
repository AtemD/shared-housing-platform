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
            self::LISTER => 'Lister',
            self::SEARCHER => 'Searcher',
            self::ADMIN => 'Admin'
        ];
     }

}