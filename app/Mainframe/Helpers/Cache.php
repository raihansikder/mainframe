<?php

namespace App\Mainframe\Helpers;

use DB;

class Cache extends \Illuminate\Support\Facades\Cache
{

    /**
     *
     * @param  string  $key
     * @return \Illuminate\Config\Repository|int|mixed
     */
    public static function time($key = 'none')
    {
        if (env('QUERY_CACHE') == true && request('no_cache') != 'true') {
            return config('mainframe.cache-time.'.$key);
        }

        return -1;
    }

    /**
     * Cache query result
     *
     * @param $query \Illuminate\Database\Query\Builder
     * @param $seconds
     * @return mixed
     */
    public static function query($query, $seconds = 0)
    {
        $key = querySignature($query);

        if ($seconds <= 0) {
            Cache::forget($key);

            return $query->get();
        }

        return \Cache::remember($key, $seconds, function () use ($query) {
            return $query->get();
        });
    }

    /**
     * Caches a raw SQL query for given minutes.
     *
     * @param  string  $sql  Raw SQL statement
     * @param  int  $seconds  Minutes to cache
     * @return array|mixed Array of objects as query result
     */
    public static function rawQuery($sql, $seconds = 0)
    {

        $key = md5($sql);

        if ($seconds <= 0) {
            Cache::forget($key);

            return DB::select(DB::raw($sql));
        }

        return \Cache::remember($key, $seconds, function () use ($sql) {
            return DB::select(DB::raw($sql));
        });

    }
}