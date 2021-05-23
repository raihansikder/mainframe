<?php

namespace App\Mainframe\Helpers;

use App\Country;

class Money
{
    public static $currencies = ['GBP', 'USD', 'EUR'];

    /**
     * Get currency symbol from currency name
     *
     * @param  string  $currency
     * @return null|string
     */
    public static function sign($currency = 'USD')
    {
        $sign = null;

        $country = Country::where('currency', strtoupper($currency))
            ->remember(timer('long'))
            ->first();

        if ($country) {
            $sign = $country->currency_symbol;
        }

        return $sign ?: '?';
    }

    /**
     * Show money amount with an optional prefix (i.e. $)
     *
     * @param $amount
     * @param  null  $prefix
     * @param  bool  $comma
     * @return string
     */
    public static function format($amount, $prefix = null, $comma = false)
    {

        $number = number_format($amount, 2, '.', '');

        if ($comma) {
            $number = number_format($amount, 2, '.', ',');
        }

        if ($prefix || $comma) {
            return $prefix.$number;
        }

        return (float) $number;
    }

    /**
     * Print the money amount
     *
     * @param $amount
     * @param  null  $prefix
     * @return string
     */
    public static function print($amount, $prefix = null)
    {

        $number = number_format($amount, 2, '.', ',');

        if ($prefix) {
            return $prefix.$number;
        }

        return $number;
    }

    // /**
    //  * Note: Enable this ConversionRate module is available
    //  * Converts money from one currency to another.
    //  *
    //  * @param  float  $amount
    //  * @param  string  $from
    //  * @param  string  $to
    //  * @param  null  $datetime
    //  * @return string|float
    //  */
    // public static function convert($amount = 0.0, $from = 'USD', $to = 'USD', $datetime = null)
    // {
    //
    //     $currencies = self::$currencies;
    //
    //     if (! isset($from, $to)) {
    //         return null;
    //     }
    //
    //     if (! in_array($from, $currencies) || ! in_array($to, $currencies)) {
    //         return null;
    //     }
    //
    //     if ($from == $to) {
    //         return \App\Projects\MyProject\Helpers\Money::format($amount);
    //         //return number_format($amount);
    //     }
    //     /**
    //      * Convert if currency is not same.
    //      **********************************/
    //     $rate = Conversionrate::recent($datetime);
    //
    //     $field = \Str::lower('rate_'.$from.'_'.$to); // generate string 'rate_usd_eur'
    //
    //     if (isset($rate->$field)) {
    //
    //         return Money::format($amount * $rate->$field);
    //     }
    //
    //     return null;
    // }

}