<?php

namespace App\Mainframe\Features\Cacher;

class Cacher
{
    /**
     * kebab-case string for cache key
     *
     * @var string
     */
    public $key;
    /**
     * Seconds for caching
     *
     * @var int
     */
    public $seconds;

    public function __construct()
    {
        // Constructor
    }

    /**
     * Get kebab-case key
     *
     * @param $str
     * @return string
     * @throws \Exception
     */
    public function key($str = null)
    {
        $this->key = $str ?? $this->key ?? 'cache-key-'.randomString().now();

        return \Str::kebab($this->key);
    }

    public static function value($key, $seconds = null)
    {
        $cached = new \Cached();
        $cached->key = $key;
        $function = lcfirst(\Str::camel($key)); //camelCaseFunction
        if (isset($seconds) && $seconds < 1) {
            \Cache::forget($key);
        }

        return $cached->$function($seconds);
    }

}