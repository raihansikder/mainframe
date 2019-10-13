<?php

use App\Country;
use App\Conversionrate;

/**
 * Get currency symbol from currency name
 * @param  string  $currency
 * @return null|string
 */
function currencySymbol($currency = 'USD')
{
    $symbol = null;
    /** @noinspection PhpUndefinedMethodInspection */
    if ($country = Country::where('currency', strtoupper($currency))->remember(cacheTime('long'))->first()) {
        $symbol = $country->currency_symbol;
    }

    return $symbol ? $symbol : '?';
}

/**
 *  Get currency symbol from currency name
 */
function symbol($currency = 'USD')
{
    return currencySymbol($currency);
}

/**
 *  Get currency symbol from currency name
 */
function curSign($currency = 'USD')
{

    $map = [
        'USD' => '$',
        'GBP' => '£',
        'EUR' => '€',
    ];

    return $map[strtoupper($currency)] ?? '?';
}

/**
 * Show money amount with an optional prefix (i.e. $)
 * @param $val
 * @param  string  $prefix
 * @return string|float
 */
function money($val, $prefix = null)
{
    $number = number_format($val, 2, '.', '');
    if ($prefix) {
        return $prefix.$number;
    }
    return $number;
}

/**
 * Converts money from one currency to another.
 * Converts money from one currency to another.
 * @param  float  $amount
 * @param  string  $currency_from
 * @param  string  $currency_to
 * @param  null  $date_time
 * @return string|float
 */
function convert($amount = 0.0, $currency_from = 'USD', $currency_to = 'USD', $date_time = null)
{

    if ( ! isset($currency_from) || ! isset($currency_to)) {
        return null;
    }

    if ($currency_from == $currency_to) {
        return money($amount);
    }
    /**
     * Convert if currency is not same.
     **********************************/
    $rate = Conversionrate::recent($date_time);
    $map = [
        'USD' => 'u',
        'EUR' => 'e',
        'GBP' => 'g',
    ];

    if (isset($map[$currency_from]) && isset($map[$currency_to])) {
        $field = 'rate_'.$map[$currency_from].'2'.$map[$currency_to]; // generate string 'rate_u2e'
        if (isset($rate->$field)) {
            $ratio = $rate->$field;
            return money((float) $amount * $ratio);
        }
    }

    return null;
}