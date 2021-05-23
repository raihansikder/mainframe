<?php

namespace App\Projects\MyProject\Helpers;

use Carbon\Carbon;

class Time
{
    /**
     * function calculates difference in seconds between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInSeconds($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $seconds = $end->diffInSeconds($start);
        if ($seconds) {
            return $seconds;
        }

        return null;

    }

    /**
     * function calculates difference in minutes between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInMinutes($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $minutes = $end->diffInMinutes($start);
        if ($minutes) {
            return $minutes;
        }

        return null;

    }

    /**
     * function calculates difference in hours between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInHours($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $hours = $end->diffInHours($start);
        if ($hours) {
            return $hours;
        }

        return null;
    }

    /**
     * function calculates difference in days between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInDays($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $days = $end->diffInDays($start);
        if ($days) {
            return $days;
        }

        return null;
    }

    /**
     * function calculates difference in months between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInMonths($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $months = $end->diffInMonths($start);
        if ($months) {
            return $months;
        }

        return null;
    }

    /**
     * function calculates difference in years between two datetime
     *
     * @param $from
     * @param $till
     * @return int
     */
    public static function differenceInYears($from, $till)
    {
        $start = Carbon::parse($from);
        $end = Carbon::parse($till);
        $years = $end->diffInYears($start);
        if ($years) {
            return $years;
        }

        return null;
    }

}