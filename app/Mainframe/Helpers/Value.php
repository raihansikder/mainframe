<?php

namespace App\Mainframe\Helpers;

class Value
{

    public static function isFilledArray($val)
    {
        if (is_array($val) && count($val)) {
            return count(Sanitize::array($val));
        }

        return false;
    }

    public static function isEmptyArray($val)
    {
        return ! Value::isFilledArray($val);
    }

}