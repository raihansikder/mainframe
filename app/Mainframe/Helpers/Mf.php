<?php

namespace App\Mainframe\Helpers;

use Auth;
use Cache;
use Schema;
use Session;
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

    public const TENANT_ADMIN_GROUP_ID    = '15';
    public const PASSWORD_VALIDATION_RULE = 'required|confirmed|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/';

    /*
    |--------------------------------------------------------------------------
    | System functions
    |--------------------------------------------------------------------------
    |
    | Mainframe requires a set of functions to bootstrap its features.
    |
    |
    */

    /**
     * @param  null  $id
     * @return null|\App\User|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed
     */
    public static function user($id = null)
    {
        /*
         * Resolve user from id.
         */
        if ($id) {
            return User::remember(timer('short'))->find($id);
        }

        /**
         * Resolve user from X-Auth-Token and client-id
         */

        $apiToken = request()->header('X-Auth-Token', null);
        $clientId = request()->header('client-id', null);

        if ($apiToken && $clientId) { // No logged user. get from user_id in url param or request header
            /** @noinspection PhpUndefinedMethodInspection */
            return User::where('api_token', $apiToken)
                ->where('id', $clientId)
                ->remember(timer('short'))
                ->first();
        }

        /*
         * Resolved from logged in user.
         */
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
        $cache = $cache ?: timer('long');

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
        $cache = $cache ?: timer('long');

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
    | Access & permission
    |--------------------------------------------------------------------------
    |
    | The functions that support main frame access management features.
    |
    */
    /**
     * This is a similar function to sentry's hasAccess. checks if current user has access to a certain permission
     *
     * @param           $permission
     * @param  bool|null  $user_id
     * @return bool
     */
    public static function hasAccess($permission, $user_id = null)
    {
        //return true;
        $allowed = false;
        $user = user($user_id);

        if (isset($user)) {
            if (! Session::has('permissions')) {
                Mf::storePermissionsInSession();
            }
            Mf::storePermissionsInSession(); // Force store permission

            $permissions = Session::get('permissions');
            if ((isset($permissions['superuser']) && $permissions['superuser'] == 1)) { // allow for super user
                $allowed = true;
            } else {
                if (isset($permissions[$permission]) && $permissions[$permission] == 1) { // allow based on specific permission
                    $allowed = true;
                }
            }
        } else {
            Session::push('permissions', "Undefined user - '$permission'");
        }

        return $allowed;
    }

    /**
     * Stores currently logged in users permission in session as array.
     */
    public static function storePermissionsInSession()
    {
        if (user()) {
            Session::put('permissions', user()->getMergedPermissions());
        }
    }

}