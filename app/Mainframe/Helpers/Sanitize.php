<?php

namespace App\Mainframe\Helpers;

class Sanitize
{

    /**
     * cleans a string and returns as csv
     *
     * @param $csv
     * @return string
     */
    public static function csv($csv)
    {
        if ($csv == null) {
            return null;
        }

        // $clearChars = array("\n", " ", "\r");
        $clearChars = ["\n", "\r"];

        return str_replace($clearChars, '', trim($csv, ', '));
    }

    /**
     * Remove empty values and arrays values from an array.
     *
     * @param  array  $array
     * @return array
     */
    public static function array($array = [])
    {
        $temp = [];
        if (is_array($array) && count($array)) { // handle if input is an array1
            foreach ($array as $a) {
                if (! is_array($a) && strlen(trim($a))) {
                    $temp[] = $a;
                }
            }
        }

        return $temp;
    }

    /**
     * removes new line tabs etc( '\n','\t') from a string
     * remove-extra-spaces-tabs-and-line-feeds-from-a-sentence-and-substitute
     *
     * @param $str
     * @return mixed
     */
    public static function string($str)
    {
        return preg_replace('/\s+/S', ' ', $str);
    }
}