<?php

namespace App\Mainframe\Features;

use Auth;
use Cache;
use Schema;
use Request;
use App\User;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;

/**
 * Class Mf
 *
 * @package App\Mainframe\Features
 */
class Mf
{

    public const TENANT_ADMIN_GROUP_ID    = '15';
    public const PASSWORD_VALIDATION_RULE = 'required|confirmed|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/';

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

    public static function user($user_id = null)
    {
        if ($user_id) {
            return User::remember(cacheTime('short'))->find($user_id);
        }
        //    // for API requests find the user based on the param/header values
        //    if(!$user && Request::has('user_id')){ // No logged user. get from user_id in url param or request header
        //        $user = User::find(Request::get('user_id'));
        //    }
        //    if(!$user && Request::has('client_id')){ // No logged user. get from user_id in url param or request header
        //        $user = User::find(Request::get('client_id'));
        //    }

        /**
         * Resolve user from client_id passed in request header. This is required when API calls are made using
         * X-Auth-Token and client-id.
         */
        if (Request::header('client-id') && Request::header('X-Auth-Token')) { // No logged user. get from user_id in url param or request header
            /** @noinspection PhpUndefinedMethodInspection */
            return User::where('id', Request::header('client-id'))
                ->where('api_token', Request::header('X-Auth-Token'))
                ->remember(cacheTime('short'))
                ->find(Request::header('client-id'));
        }

        // for logged in user
        if (Auth::check()) {
            return Auth::user();
        }

        // Return an empty user instance
        return new User();
    }

    /**
     * Get cached module list
     *
     * @return mixed|Module[]
     */
    public static function modules()
    {
        return Cache::remember('active-modules', cacheTime('long'),
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