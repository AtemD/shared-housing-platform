<?php 

namespace App\References;

class Currency
{
    const ETHIOPIAN_BIRR = 1;

    /**
     * return list of currencies and their labels
     * 
     * @return array
     */
     public static function currencyList()
     {
        return [
            self::ETHIOPIAN_BIRR => 'ETB',
        ];
     }

}