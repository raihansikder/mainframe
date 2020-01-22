<?php

namespace App\Mainframe\Helpers;

use Auth;
use Cache;
use Schema;
use App\Mainframe\Modules\Users\User;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;

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
     * @param  null  $id
     * @return null|\App\User|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed
     */
    public static function user($id = null)
    {
        // Resolve user from id.
        if ($id) {
            return User::remember(timer('short'))->find($id);
        }

        // Check if usr is API caller
        if ($user = Mf::apiCaller()) {
            return $user;
        }

        // Resolved from logged in user
        if (Auth::check()) {
            return Auth::user();
        }

        // Return an empty user instance
        return new User();
    }

    /**
     * Get bearer
     *
     * @return null|\App\Mainframe\Modules\Users\User|mixed
     */
    public static function bearer()
    {
        return User::ofBearer(request()->bearerToken());
    }

    /**
     * Get
     *
     * @return null|\App\Mainframe\Modules\Users\User|mixed
     */
    public static function apiCaller()
    {
        $apiToken = request()->header('X-Auth-Token');
        $clientId = request()->header('client-id');

        return User::apiCaller($apiToken, $clientId);
    }

    /**
     * Get cached module list
     *
     * @return mixed|Module[]
     */
    public static function modules()
    {
        return Cache::remember('active-modules', timer('long'),
            function () {
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

}