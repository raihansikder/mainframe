<?php

namespace App\Mainframe\Helpers;

use App\Content;
use App\Module;
use App\ModuleGroup;
use App\User;
use Auth;
use Cache;
use Schema;

/**
 * Class Mf
 *
 * @package App\Mainframe\Features
 */
class Mf
{

    /*
    |--------------------------------------------------------------------------
    | System functions
    |--------------------------------------------------------------------------
    |
    | Mainframe requires a set of functions to bootstrap its features.
    |
    */

    /**
     * Mainframe classes root namespace
     *
     * @return string
     */
    public static function namespace()
    {
        return 'App\Mainframe';
    }

    /**
     * Mainframe resource root
     *
     * @return string
     */
    public static function resources()
    {
        return 'mainframe';
    }

    /**
     * Mainframe public root directory
     *
     * @return string
     */
    public static function public()
    {
        return 'mainframe';
    }

    /**
     * Get mainframe config from config/mainframe/config.php
     *
     * @param $key
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function config($key)
    {
        return config('mainframe.config.'.$key);
    }

    /**
     * Get project name. This is a CamelCase name of the project
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function project()
    {
        return config('mainframe.config.project');
    }

    /**
     * Kebab case key of the project name
     *
     * @return string
     */
    public static function projectKey()
    {
        return \Str::kebab(self::project());
    }

    /**
     * Project root name space
     *
     * @return string
     */
    public static function projectNamespace()
    {
        return 'App\Projects\\'.self::project();
    }

    /**
     * Project resource root
     *
     * @return string
     */
    public static function projectResources()
    {
        return 'projects.'.self::projectKey();
    }

    /**
     * Project public root directory
     *
     * @return string
     */
    public static function projectPublic()
    {
        return 'projects/'.self::projectKey();
    }

    /**
     * Project config
     *
     * @param $key
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function projectConfig($key)
    {
        return config('projects.'.self::projectKey().'.config.'.$key);
    }

    /**
     * Common function to get current user.
     * Do not change this function.
     *
     * @param  null  $id
     * @return null|\App\User|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed
     */
    public static function user($id = null)
    {
        // Resolve user from id.
        if ($id) {
            return User::byId($id);
        }

        // Resolved from logged in user
        if (Auth::check()) {
            return Auth::user();
        }

        // Check if usr is bearer
        if ($user = Auth::guard('bearer')->user()) {
            return $user;
        }

        // Check if usr is API caller
        if ($user = Auth::guard('x-auth')->user()) {
            return $user;
        }

        // Return an empty guest user instance
        // return null;

        return User::guestInstance();
    }

    /**
     * Get cached module list
     *
     * @return mixed|Module[]
     */
    public static function modules()
    {
        return Cache::remember('active-modules', timer('long'), function () {
            return Schema::hasTable('modules') ? Module::getActiveList() : [];
        });

    }

    /**
     * Get cached module groups
     *
     * @return mixed|ModuleGroup[]
     */
    public static function moduleGroups()
    {
        return Cache::remember('active-module-groups', timer('long'),
            function () {
                return Schema::hasTable('module_groups') ? ModuleGroup::getActiveList() : [];
            });
    }

    /**
     * Create a unique signature/key for a HTTP request made
     * Usually used for caching.
     *
     * @param  String  $append  Raw Query string
     * @return string
     */
    public static function httpRequestSignature($append = null)
    {
        $signature = \URL::full().json_encode(request()->all()).$append;
        if (user()) {
            $signature .= user()->uuid;
        }

        return base64_encode($signature);
    }

    /*
    |--------------------------------------------------------------------------
    | Database/Table/Schema/ related helper functions
    |--------------------------------------------------------------------------
    |
    | Often we shall need to fetch the columns of an existing table. The
    | default Schema::functions do not cache these results which is
    | not performance friendly. Here we have a list of similar
    | functions where have cached the values.
    */

    /**
     * Get columns of a table.
     *
     * @param $table
     * @param  null  $cache
     * @return array
     */
    public static function tableColumns($table, $cache = null)
    {
        $cache = $cache ?: timer('very-long');

        return Cache::remember("columns-of-{$table}", $cache,
            function () use ($table) {
                return Schema::getColumnListing($table);
            });
    }

    /**
     * Check if a table has column
     *
     * @param $table
     * @param $column
     * @param  null  $cache
     * @return bool
     */
    public static function tableHasColumn($table, $column, $cache = null)
    {
        $cache = $cache ?: timer('very-long');

        return in_array($column, Mf::tableColumns($table, $cache));
    }

    /**
     * Check if the given table has a tenant field (tenant_id)
     *
     * @param $table
     * @return bool
     */
    public static function tableHasTenant($table)
    {
        return Mf::tableHasColumn($table, 'tenant_id');
    }

    /**
     * Get content
     *
     * @param $key
     * @param  string  $part
     * @return mixed|null
     */
    public static function content($key, $part = 'body')
    {
        $content = Content::where('key', $key)->where('is_active', 1)->first();
        if ($content) {
            return $content->part($part);
        }

        return null;
    }

    /**
     * Create a URL by adding the given params to an url
     * Ref: https://www.php.net/manual/en/function.parse-url.php
     * https://www.php.net/manual/en/function.parse-str.php
     *
     * @param $url
     * @param  null|string|array  $params
     * @return string
     */
    public static function link($url, $params = null)
    {

        $url = trim($url, "&?=");
        $base = preg_replace('/\?.*/', '', $url); //https://stackoverflow.com/questions/4270677/removing-query-string-in-php-sometimes-based-on-referrer

        $oldQueryStr = parse_url($url, PHP_URL_QUERY); //

        $oldParams = [];
        if (strlen($oldQueryStr)) {
            parse_str($oldQueryStr, $oldParams); // Assign the parameter array to $oldParams
        }

        $newParams = $params ?? [];
        if (!is_array($params)) {
            parse_str($params, $newParams); // Assign the parameter array to $newParams
        }

        $mergedParams = array_merge($oldParams, $newParams);

        $newUrl = $base;
        if (count($mergedParams)) {
            $newUrl .= '?'.http_build_query($mergedParams);
        }

        // $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?').http_build_query($mergedParams);

        return trim($newUrl, "&?=");
    }

}