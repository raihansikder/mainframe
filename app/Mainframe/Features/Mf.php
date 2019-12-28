<?php

namespace App\Mainframe\Features;

use Cache;
use Schema;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;

/**
 * Class Mf
 *
 * @package App\Mainframe\Features
 */
class Mf
{

    /* All HTTP codes
     * https://gist.github.com/jeffochoa/a162fc4381d69a2d862dafa61cda0798
     */
    public const TENANT_ADMIN_GROUP_ID = 15;

    public static function tenantContext($table, $user = null)
    {
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | System functions
    |--------------------------------------------------------------------------
    |
    | Mainframe requires a set of functions to bootstrap its features.
    |
    |
    */
    public static function modules()
    {
        return Cache::remember('active-modules', cacheTime('long'),
            function () {
                return Schema::hasTable('modules') ? Module::getActiveList() : [];
            });

    }

    public static function moduleGroups()
    {
        return Cache::remember('active-module-groups', cacheTime('long'),
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
    public static function requestSignature($append = null)
    {
        $signature = \URL::full().json_encode(request()->all()).$append;
        if (user()) {
            $signature .= user()->uuid;
        }

        return md5($signature);
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
        $cache = $cache ?: cacheTime('long');

        return Cache::remember('columns-of:'.$table, $cache,
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
        $cache = $cache ?: cacheTime('long');

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

    /*
    |--------------------------------------------------------------------------
    | Sanitization
    |--------------------------------------------------------------------------
    |
    |
    |
    */

}