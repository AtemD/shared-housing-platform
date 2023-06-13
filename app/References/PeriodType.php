<?php 

namespace App\References;

/**
 * Period types involving rent and stay are all converted to days and then stored in the database.
 */
class PeriodType
{
    const DAY = 1;
    const WEEK = 2;
    const MONTH = 3;
    const YEAR = 4;

    const DAYS_PER_MONTH = 30;
    const DAYS_PER_WEEK = 7;
    const DAYS_PER_YEAR = 365;
    const DAYS_PER_DAY = 1;

    /**
     * return list of stay periods
     * 
     * @return array
     */
     public static function stayPeriodTypeList()
     {
        return [
            self::MONTH => 'month(s)',
            // self::WEEK => 'week(s)',
            // self::DAY => 'day(s)',
            // self::YEAR => 'year(s)'
        ];
     }

     /**
     * return list of rent periods
     * 
     * @return array
     */
    public static function rentPeriodTypeList()
    {
       return [
           self::MONTH => '/month',
        //    self::WEEK => '/week',
        //    self::DAY => '/day',
        //    self::YEAR => '/year'
       ];
    }

    public static function periodTypeToDaysList()
     {
        return [
            self::DAYS_PER_MONTH => 'days per month',
            // self::DAYS_PER_WEEK => 'days per week',
            // self::DAYS_PER_DAY => 'days per day',
            // self::DAYS_PER_YEAR => 'days per year'
        ];
     }

    public static function convertPeriodTypeToDays($period)
    {
        switch($period) {
            case self::MONTH:
                // convert month to days
                return self::DAYS_PER_MONTH;
                break;
            case self::WEEK:
                // convert week to days
                return self::DAYS_PER_WEEK;
                break;
            case self::YEAR:
                // convert year to days
                return self::DAYS_PER_YEAR;
                break;
            default:
                // assume it already in days
                return self::DAYS_PER_DAY;
                break;
        }
    }

    public static function convertDaysToPeriodType($days)
    {
        switch($days) {
            case self::DAYS_PER_MONTH:
                // convert days to month
                return self::MONTH;
                break;
            case self::DAYS_PER_WEEK:
                // convert days to week
                return self::WEEK;
                break;
            case self::DAYS_PER_YEAR:
                // convert days to year
                return self::YEAR;
                break;
            default:
                // assume it already in months
                return self::DAY;
                break;
        }
    }

}