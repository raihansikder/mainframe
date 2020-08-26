<?php

namespace App\Projects\MyProject\Helpers;

use App\Mainframe\Helpers\Money as MfMoney;

// use App\Projects\MyProject\Modules\ConversionRates\ConversionRate;
use Illuminate\Support\Str;

class Money extends MfMoney
{

    /**
     * Converts money from one currency to another.
     *
     * @param  float  $amount
     * @param  string  $from
     * @param  string  $to
     * @param  null  $datetime
     * @return string|float
     */
    public static function convert($amount = 0.0, $from = 'USD', $to = 'USD', $datetime = null)
    {

        /*
        $currencies = ['USD', 'EUR', 'GBP'];

        if (! isset($from, $to)) {
            return null;
        }

        if (! in_array($from, $currencies) || ! in_array($to, $currencies)) {
            return null;
        }

        if ($from == $to) {
            return Money::format($amount);
            //return number_format($amount);
        }

        // Convert if currency is not same.
        $rate = Conversionrate::recent($datetime);

        $field = Str::lower('rate_'.$from.'_'.$to); // generate string 'rate_usd_eur'

        if (isset($rate->$field)) {

            return Money::format($amount * $rate->$field);
        }

        return null;
        */
    }
}