<?php

use App\Projects\MyProject\Helpers\Date;

/**
 * Show date
 *
 * @param \Carbon\Carbon|string $date
 * @return mixed
 */
function formatDate($date)
{
    return Date::formatted($date);
}

/**
 * Show time
 *
 * @param \Carbon\Carbon|string $date
 * @return mixed
 */
function formatDateTime($date)
{
    return Date::formattedDateTime($date);
}
