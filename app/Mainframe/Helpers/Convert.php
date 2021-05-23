<?php

namespace App\Mainframe\Helpers;

class Convert
{
    /**
     * Convert CSV to array.
     *
     * @param  string  $csv
     * @return array
     */
    public static function csvToArray($csv)
    {
        return Sanitize::array(explode(',', Sanitize::csv($csv)));
    }

    /**
     * Convert CSV to array.
     *
     * @param  array  $array
     * @return string
     */
    public static function arrayToCsv($array)
    {
        return implode(',', Sanitize::array($array));
    }
}