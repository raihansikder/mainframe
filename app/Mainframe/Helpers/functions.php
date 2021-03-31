<?php

use App\Mainframe\Helpers\Mf;
use Illuminate\Support\MessageBag;

/**
 * Mainframe configs
 *
 * @param $key
 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
 */
function mf_config($key)
{
    return Mf::config($key);
}

/**
 * Project config
 *
 * @param $key
 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
 */
function project_config($key)
{
    return Mf::projectConfig($key);
}

/**
 * Mainframe classes root namespace
 *
 * @return string
 */
function mfNamespace()
{
    return Mf::namespace();
}

/**
 * Mainframe resource root
 *
 * @return string
 */
function mfResources()
{
    return Mf::resources();
}

/**
 * Mainframe public root directory
 *
 * @return string
 */
function mfPublic()
{
    return Mf::public();
}

/**
 * Get project name. This is a CamelCase name of the project
 *
 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
 */
function project()
{
    return Mf::project();
}

/**
 * Kebab case key of the project name
 *
 * @return string
 */
function projectKey()
{
    return Mf::projectKey();
}

/**
 * Project root name space
 *
 * @return string
 */
function projectNamespace()
{
    return Mf::projectNamespace();
}

/**
 * Project resource root
 *
 * @return string
 */
function projectResources()
{
    return Mf::projectResources();
}

/**
 * Project public root directory
 *
 * @return string
 */
function projectPublic()
{
    return Mf::projectPublic();
}

/**
 * returns sentry object of currently logged in user
 *
 * @param  bool|null  $id
 * @return \Illuminate\Contracts\Auth\Authenticatable|\App\User
 */
function user($id = null)
{
    return Mf::user($id);
}

/**
 * Get bearer user
 *
 * @return \Illuminate\Contracts\Auth\Authenticatable
 */
function bearer()
{
    return Auth::guard('bearer')->user();
}

/**
 * Get bearer user
 *
 * @return \Illuminate\Contracts\Auth\Authenticatable
 */
function apiCaller()
{
    return Auth::guard('x-auth')->user();
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
        return Webpatser\Uuid\Uuid::generate(4)->string;
    } catch (Exception $e) {
    }

    return false;

}

/**
 * Get setting
 *
 * @param $name
 * @return null|array|bool|mixed|string
 */
function setting($name)
{
    return \App\Mainframe\Modules\Settings\Setting::read($name);
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

function error($message = '', $setMsg = true, $ret = false)
{
    $key = 'errors';
    if ($setMsg && strlen($message)) {
        if (!in_array($message, Session::get($key, []))) {
            // Session::push($key, $message);
        }
        resolve(MessageBag::class)->add($key, $message);
    }

    return $ret;
}

function message($message = '', $setMsg = true, $ret = false)
{
    $key = 'messages';
    if ($setMsg && strlen($message)) {
        if (!in_array($message, Session::get($key, []))) {
            // Session::push($key, $message);
        }
        resolve(MessageBag::class)->add($key, $message);
    }

    return $ret;
}

/**
 * This function pushes an error string to 'error' array of session.
 *
 * @param  string  $message
 * @param  bool  $ret
 * @param  bool  $setMsg
 * @return bool
 * @deprecated use error()
 */
function setError($message = '', $setMsg = true, $ret = false)
{
    return error($message = '', $setMsg = true, $ret = false);
}

/**
 * Resolve singleton messageBag
 *
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Support\MessageBag|mixed
 */
function messageBag()
{
    return resolve(MessageBag::class);
}
