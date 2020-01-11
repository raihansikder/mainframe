<?php

use App\Mainframe\Helpers\Mf;
use Illuminate\Support\MessageBag;

/**
 * returns sentry object of currently logged in user
 *
 * @param  bool|null  $id
 * @return \Illuminate\Contracts\Auth\Authenticatable|\App\Mainframe\Modules\Users\User
 */
function user($id = null)
{
    return Mf::user($id);
}

/**
 * Get a cached version of active modules.
 *
 * @return \App\Mainframe\Modules\Modules\Module[]|mixed
 */
function modules()
{
    return Mf::modules();
}

/**
 * create uuid
 *
 * @return string|bool
 */
function uuid()
{
    try {
        return Webpatser\Uuid\Uuid::generate(4);
    } catch (Exception $e) {
    }

    return false;

}

/**
 * Get time in seconds
 *
 * @param  null  $key
 * @return \Illuminate\Config\Repository|int|mixed
 */
function timer($key = null)
{
    return \App\Mainframe\Helpers\Cache::time($key);
}

/**
 * returns absolute path from a relative path
 *
 * @param $relativePath
 * @return string
 */
function absPath($relativePath)
{
    return public_path().$relativePath;
}

/**
 * Return md5 key for a query.
 *
 * @param $query \Illuminate\Database\Query\Builder
 * @return string
 */
function querySignature($query)
{
    return md5($query->toSql().json_encode($query->getBindings()));
}

/**
 * This function pushes an error string to 'error' array of session.
 *
 * @param  string  $str
 * @param  bool  $ret
 * @param  bool  $setMsg
 * @return bool
 */
function setError($str = '', $setMsg = true, $ret = false)
{
    if ($setMsg && strlen($str)) {
        if (! in_array($str, Session::get('error', []))) {
            Session::push('error', $str);
        }
        resolve(MessageBag::class)->add('message', $str);
    }

    return $ret;
}

/**
 * Renders the left menu of the application and makes the current item active based on breadcrumb
 *
 * @param        $tree
 * @param  string  $currentModuleName
 * @param  array  $breadcrumbs
 * @return null
 */
function renderMenuTree($tree, $currentModuleName = '', $breadcrumbs = [])
{
    return \App\Mainframe\Helpers\View::renderMenuTree($tree, $currentModuleName, $breadcrumbs);
}

/**
 * Returns an array with module/module_group name as key
 *
 * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|null  $module
 * @return array
 */
function breadcrumb($module = null)
{
    return \App\Mainframe\Helpers\View::breadcrumb($module);
}

