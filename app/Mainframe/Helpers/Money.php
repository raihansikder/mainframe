<?php

namespace App\Mainframe\Helpers;

use App\Mainframe\Modules\Countries\Country;

class Money
{
    /**
     * Get currency symbol from currency name
     *
     * @param string $currency
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
     * @param null $prefix
     * @param bool $comma
     * @return string
     */
    public static function format($amount, $prefix = null, $comma = false)
    {

        $number = $amount;

        if ($comma) {
            $number = number_format($amount, 2, '.', ',');
        } else {
            $number = number_format($amount, 2, '.', '');
        }

        if ($prefix) {
            return $prefix.$number;
        }

        return $number;
    }

    /**
     * Print the money amount
     *
     * @param $amount
     * @param null $prefix
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

}