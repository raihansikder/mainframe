<?php
namespace App\Mainframe\Helpers;

use Carbon\Carbon;

class Date
{
    /**
     * Show date
     *
     * @param \Carbon\Carbon|string $date
     * @param null $format
     * @return mixed
     */
    public static function formatted($date, $format = null)
    {
        if (! $date) {
            return null;
        }

        $format = $format ?: config('mainframe.config.date_format');

        if ($date instanceof Carbon) {
            return $date->format($format);
        }

        return Carbon::createFromDate($date)->format($format);
    }

    /**
     * Show time
     *
     * @param \Carbon\Carbon|string $date
     * @param null $format
     * @return mixed
     */
    public static function formattedDateTime($date, $format = null)
    {
        if (! $date) {
            return null;
        }

        $format = $format ?: config('mainframe.config.datetime_format');

        if ($date instanceof Carbon) {
            return $date->format($format);
        }

        return Carbon::createFromDate($date)->format($format);
    }

}