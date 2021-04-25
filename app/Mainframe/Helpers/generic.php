<?php /** @noinspection CallableParameterUseCaseInTypeContextInspection */

/**
 * Generic helper functions to be used by the framework
 *
 * @Author : Raihan S
 * @email  : raihan.act@gmail.com
 */

/**
 * Converts a one dimensional array to a key-value paired array with same key and value
 * this is useful to generate options for select.
 *
 * @param  array  $array
 * @return array
 */
function kv($array = [])
{
    $temp = [];
    if (count($array)) {
        foreach ($array as $a) {
            $temp[$a] = $a;
        }
    }

    return $temp;
}

/**
 * returns extension from path
 *
 * @param $path
 * @return mixed
 */
function extFrmPath($path)
{
    $path_parts = pathinfo($path);

    return $path_parts['extension'] ?? null;
}

/**
 * Echos a BR. Something handy for echo based debugging :)
 *
 * @param $string
 */
function echoBr($string)
{
    echo $string."<br/>";
}

/**
 * returns the key of a multidimensional array
 *
 * @param $array
 * @return bool|array
 */
function keyAsArray($array = [])
{
    [$keys, $values] = \Illuminate\Support\Arr::divide($array);
    if (is_array($keys)) {
        return $keys;
    }

    return false;

}

/**
 * echos array in a more readable manner
 *
 * @param  array  $my_array
 * @return string $my_array
 */
function echoArray($my_array)
{
    if (is_array($my_array)) {
        echo "<table cellspacing=0 cellpadding=3 width=100% class='table table-condensed table-array-dump'>";
        echo '<tr><td colspan=2 style="background-color:#333333;"><strong><span style="color: white; "></span></strong></td></tr>';
        foreach ($my_array as $k => $v) {
            echo '<tr><td  style="width:40px;background-color:#F0F0F0;">';
            echo '<strong>'.$k."</strong></td><td>";
            echoArray($v);
            echo "</td></tr>";
        }
        echo "</table>";

        return;
    }
    echo $my_array;
}

/**
 * Shorthand function for echoArray
 *
 * @param $arr
 * @return string
 */
function printArray($arr)
{
    return echoArray($arr);
}

/**
 * Changes array to object
 *
 * @param $array
 * @return object
 */
function arrayToObject($array)
{
    return (object) $array;
}

/**
 * Generate random characters
 *
 * @param  int  $length
 * @return string
 * @throws \Exception
 */
function randomString($length = 8)
{
    $str = '';
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    //$characters = array_merge(range('A', 'Z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = random_int(0, $max);
        $str .= $characters[$rand];
    }

    return $str;
}

/**
 * generate 8 character random code
 *
 * @return string
 * @throws \Exception
 */
function generateCode()
{
    return randomString(8);
}

function toArray($input)
{
    if (is_array($input)) {
        return $input;
    }

    if (is_string($input) && isJson($input)) {
        return json_decode($input);
    }

    if (is_string($input) && isCsv($input)) {
        return csvToArray($input);
    }

    return $input ? [$input] : null;
}

function isJson($input)
{
    return is_string($input) && is_array(json_decode($input, true)) && (json_last_error() == JSON_ERROR_NONE);
}

/**
 * function to check if json is valid
 * http://stackoverflow.com/questions/6041741/fastest-way-to-check-if-a-string-is-json-in-php
 *
 * @param $string
 * @return mixed
 */
function validateJson($string)
{
    // decode the JSON data
    echo (string) $string;
    $result = json_decode((string) $string);

    // switch and check possible JSON errors
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error = ''; // JSON is valid // No error has occurred
            break;
        case JSON_ERROR_DEPTH:
            $error = 'The maximum stack depth has been exceeded.';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $error = 'Invalid or malformed JSON.';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $error = 'Control character error, possibly incorrectly encoded.';
            break;
        case JSON_ERROR_SYNTAX:
            $error = 'Syntax error, malformed JSON.';
            break;
        // PHP >= 5.3.3
        case JSON_ERROR_UTF8:
            $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_RECURSION:
            $error = 'One or more recursive references in the value to be encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_INF_OR_NAN:
            $error = 'One or more NAN or INF values in the value to be encoded.';
            break;
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $error = 'A value of a type that cannot be encoded was given.';
            break;
        default:
            $error = 'Unknown JSON error occured.';
            break;
    }

    if ($error !== '') {
        // throw the Exception or exit // or whatever :)
        exit($error);
    }

    // everything is OK
    return $result;
}

/**
 * http://stackoverflow.com/questions/10290849/how-to-remove-multiple-utf-8-bom-sequences-before-doctype
 * @param $text
 * @return mixed
 */
function removeUtf8Bom($text)
{
    $bom = pack('H*', 'EFBBBF');

    return preg_replace("/^$bom/", '', $text);
}

/**
 * Multilevel array search
 * http://community.sitepoint.com/t/best-way-to-do-array-search-on-multi-dimensional-array/16382/3
 *
 * @param       $array
 * @param       $search
 * @param  array  $keys
 * @return array
 */
function deepSearchArray($array, $search, $keys = [])
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $sub = deepSearchArray($value, $search, array_merge($keys, [$key]));
            if (count($sub)) {
                return $sub;
            }
        } else {
            if ($value === $search) {
                return array_merge($keys, [$key]);
            }
        }
    }

    return [];
}

/**
 * get current date
 *
 * @return bool|string
 */
// function today() {
//     return date('Y-m-d');
// }

/**
 * returns current date time
 *
 * @return bool|string
 */
// function now() {
//     return date('Y-m-d H:i:s');
// }

/**
 * gets total number of days between two dates
 *
 * @param $date1
 * @param $date2
 * @return number of days
 * @internal param $d1
 * @internal param $d2
 */
function dateDiff($date1, $date2)
{
    return abs(floor((strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)));
}

/**
 * @param $start_date
 * @param $end_date
 */
function printDateDiff($start_date, $end_date)
{
    $diff = dateDiff($start_date, $end_date);
    //myprint_r($diff);
    echo $diff['total_days'];
}

/**
 * returns a number format with X decimal places
 *
 * @param $number
 * @param $decimalPlaces
 * @return string
 * @internal param $places
 */
function decimal($number, $decimalPlaces = 2)
{
    return number_format((float) $number, $decimalPlaces, '.', '');
}

/**
 * @param        $str
 * @param  int  $count
 * @param  string  $char
 * @return string
 */
function pad($str, $count = 6, $char = '0')
{
    return str_pad($str, $count, $char, STR_PAD_LEFT);
}

/**
 * Checks if an input is CSV
 *
 * @param $input
 * @return bool|int
 */
function isCsv($input)
{
    if (is_array($input)) {
        return false;
    }
    if (strlen($input) && strpos($input, ',') !== false) {
        return strlen(cleanCsv($input));
    }

    return false;
}

/**
 * cleans a string and returns as csv
 *
 * @param $csv
 * @return string
 */
function cleanCsv($csv)
{
    // $clearChars = array("\n", " ", "\r");
    $clearChars = ["\n", "\r"];

    return str_replace($clearChars, '', trim($csv, ', '));
}

/**
 * returns array from csv
 *
 * @param $csv
 * @return array
 */
function csvToArray($csv)
{
    return cleanArray(explode(',', cleanCsv($csv)));
}

/**
 * Converts an One-dimensional array into CSV.
 *
 * @param $array
 * @return string
 */
function arrayToCsv($array)
{
    return cleanCsv(implode(',', $array));
}

/**
 * Returns a csv of an one dimensional array
 *
 * @param $array
 * @return string
 */
function csvFromArray($array)
{
    return cleanCsv(implode(',', $array));
}

/**
 * removes new line tabs etc( '\n','\t') from a string
 * remove-extra-spaces-tabs-and-line-feeds-from-a-sentence-and-substitute
 *
 * @param $str
 * @return mixed
 */
function cleanStrNTS($str)
{
    return preg_replace('/\s+/S', ' ', $str);
}

/**
 * Wraps with comma. This special csv is used search ids in database that are stored as csv
 * In this approach it is possible to find id (say id=123) by doing string match "%,123,&"
 *
 * @param $str
 * @return string
 * @internal param $string
 */
function commaWrap($str)
{
    $ret = null;
    if (strlen($str)) {
        $ret = ','.trim(cleanCsv(cleanStrNTS($str)), ', ').',';
    }

    return $ret;
}

/**
 * Converts bytes into human readable file size.
 *
 * @param  string  $bytes
 * @return string human readable file size (2,87 ??)
 * @author Mogilev Arseny
 */
function convertFileSize($bytes)
{
    $result = 'undefined';
    $bytes = floatval($bytes);
    $arBytes = [
        0 => [
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4),
        ],
        1 => [
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3),
        ],
        2 => [
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2),
        ],
        3 => [
            "UNIT" => "KB",
            "VALUE" => 1024,
        ],
        4 => [
            "UNIT" => "B",
            "VALUE" => 1,
        ],
    ];

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }

    return $result;
}

/**
 * check if an extension is an image extension
 *
 * @param  string  $ext
 * @return bool
 */
function isImageExtension($ext = '')
{
    if (in_array(strtolower($ext), ['jpg', 'png', 'gif', 'jpeg'])) {
        return true;
    }

    return false;
}

// Array related functions

/**
 * Checks if all of the needls are available in array
 *
 * @param  array  $needles
 * @param  array  $haystack
 * @return bool
 */
function allInArray(array $needles, array $haystack)
{
    if (count($needles) && count($haystack)) {
        foreach ($needles as $needle) {
            if (!in_array($needle, $haystack)) {
                return false;
            }
        }

        return true;
    }

    return false;
}

/**
 * Checks if at least one of the needles is available in array
 *
 * @param  array  $needles
 * @param  array  $haystack
 * @return bool
 */
function oneInArray(array $needles, array $haystack)
{
    if (count($needles) && count($haystack)) {
        foreach ($needles as $needle) {
            if (in_array($needle, $haystack)) {
                return true;
            }
        }
    }

    return false;
}

/**
 * Checks if non of the needles are in array
 *
 * @param  array  $needles
 * @param  array  $haystack
 * @return bool
 */
function noneInArray(array $needles, array $haystack)
{
    return !oneInArray($needles, $haystack);
}

/**
 * Function to do multiple find replaces in a string.
 *
 * @param  string  $str
 * @param  array  $replaces
 * @return mixed|string
 */
function multipleStrReplace($str = '', $replaces = [])
{
    foreach ($replaces as $k => $v) {
        $str = str_replace($k, $v, $str);
    }

    return $str;
}

/**
 * Remove empty values and arrays values from an array.
 *
 * @param  array  $array
 * @return array
 */
function removeEmptyVals($array = [])
{
    $temp = [];
    if (is_array($array) && count($array)) {                    // handle if input is an array1
        foreach ($array as $a) {
            if (!is_array($a) && strlen(trim($a))) {
                $temp[] = trim($a);
            }
        }
    }

    // Todo: Better implementation
    // $tags = collect($tags)->map(function($tag){
    //     return trim($tag);
    // })->reject(function ($name) {
    //     return empty($name);
    // });

    return $temp;
}

/**
 * Alias function for removeEmptyVals()
 *
 * @param  array  $array
 * @return array
 */
function cleanArray($array = [])
{
    return removeEmptyVals($array);
}

/**
 * Create a one dimensional array to be used in Eloquent whereIn
 *
 * @param $val
 * @return array
 */
function arrayForWhereIn($val)
{
    $items = [];
    if (is_array($val) && count($val)) {
        $items = removeEmptyVals($val);
    } else {
        if (strlen($val) && strstr($val, ',')) {
            $items = explode(',', $val);
        } else {
            if (strlen($val)) {
                $items[] = (int) $val;
            }
        }
    }

    return $items;
}

/**
 * create a letter range with arbitrary length
 *
 * @param  int  $length
 * @return array
 */
function createLetterRange($length)
{
    $range = [];
    $letters = range('A', 'Z');
    for ($i = 0; $i < $length; $i++) {
        $position = $i * 26;
        foreach ($letters as $ii => $letter) {
            $position++;
            if ($position <= $length) {
                $range[] = ($position > 26 ? $range[$i - 1] : '').$letter;
            }
        }
    }

    return $range;
}

/**
 * Change array keys to snake case
 *
 * @param $array
 * @return array
 */
function snakeCaseKeys($array)
{
    $arr = [];
    foreach ($array as $key => $value) {
        $key = snake_case($key);
        if (is_array($value)) {
            $value = snakeCaseKeys($value);
        }
        $arr[$key] = $value;
    }

    return $arr;
}

/**
 * Get percentage
 *
 * @param $number
 * @param $percent
 * @return float|int
 */
function percent($number, $percent)
{
    return $number * ($percent / 100);
}

/**
 * Add a percentage to a number
 *
 * @param $number
 * @param $percent
 * @return float|int
 */
function addPercent($number, $percent)
{
    return $number + percent($number, $percent);
}

/**
 * Add a percentage to a number
 *
 * @param $number
 * @param $percent
 * @return float|int
 */
function subtractPercent($number, $percent)
{
    return $number - percent($number, $percent);
}