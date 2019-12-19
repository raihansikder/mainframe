<?php

use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Settings\Setting;



/**
 * returns the table/module name(without prefix) from a model class name
 *
 * @param  string  $class  Class name with first letter in uppercase. i.e. Foo
 * @return string
 */
function moduleName($class)
{

    return Str::plural(lcfirst(class_basename($class)));
}

/**
 * Returns model name with Uppercase first letter and singular.
 * If there is tenant specific models then full class path is returned
 *
 * @param $module  : plural, lowercase first letter
 * @return string
 */
function model($module)
{
    return "\\App\\".Str::singular(ucfirst($module));
}

/**
 * Returns controller name with Uppercase first letter and singular.
 *
 * @param $module
 * @return string
 */
function controller($module)
{
    return ucfirst($module)."Controller";
}



/**
 * Derive module name from an eloquent model element
 *
 * @param $element \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule
 * @return string
 * @internal param $element_object
 */
function elementModule($element)
{
    return moduleName(class_basename($element));
}

/**
 * This function pushes an error string to 'error' array of session.
 *
 * @param  string  $str
 * @param  bool  $ret
 * @param  bool  $set_msg
 * @return bool
 */
function setError($str = '', $set_msg = true, $ret = false)
{
    if ($set_msg && strlen($str)) {
        if (! in_array($str, Session::get('error', []))) {
            Session::push('error', $str);
        }
        resolve(MessageBag::class)->add('message', $str);
    }

    return $ret;
}

/**
 * This function pushes an error string to 'message' array of session.
 *
 * @param  string  $str
 * @param  bool  $ret
 * @param  bool  $set_msg
 * @return bool
 */
function setMessage($str = '', $set_msg = true, $ret = true)
{
    if ($set_msg && strlen($str)) {
        if (! in_array($str, Session::get('message', []))) {
            Session::push('message', $str);
        }
    };

    return $ret;
}

/**
 * This function pushes an error string to 'success' array of session.
 *
 * @param  string  $str
 * @param  bool  $ret
 * @param  bool  $set_msg
 * @return bool
 */
function setSuccess($str = '', $set_msg = true, $ret = true)
{
    if ($set_msg && strlen($str)) {
        if (! in_array($str, Session::get('success', []))) {
            Session::push('success', $str);
        }
    }

    return $ret;
}

/**
 * @param  string  $str
 * @param  bool  $ret
 * @param  bool  $set_msg
 * @return bool
 */
function setDebug($str = '', $set_msg = true, $ret = true)
{
    if ($set_msg && strlen($str)) {
        Session::push('debug', $str);
    }

    return $ret;
}

/**
 * Prepares the return array for Controller post operations (store, update, delete, restore).
 * This array contains the value that will be returned as json as a consequence of
 * CRUD operation.
 *
 * @param  string  $status
 * @param  string  $msg
 * @param  array  $merge  : contains additional data that needs to be returned as json
 * @return array
 */
function ret($status = '', $msg = '', $merge = [])
{
    if ($status == 'fail') {
        setError($msg);
    } else {
        if ($status == 'success') {
            setSuccess($msg);
        } else {
            setMessage($msg);
        }
    }

    $ret = [
        'status' => $status,
        'message' => $msg,
        'validation_errors' => [],
    ];

    return array_merge($ret, $merge);
}

/**
 * This function fills ajax return values with saved information from session and then cleans up the session.
 *
 * @param $ret
 * @return mixed
 */
function fillFromSession($ret)
{
    $session_keys = ['message', 'error', 'success'];
    foreach ($session_keys as $k) {
        $ret['session_'.$k] = null;
        if (Session::has($k)) {
            if (is_array(Session::get($k))) {
                $ret['session_'.$k] = Session::get($k); // if array load the whole array
            } else {
                array_push($ret['session_'.$k], Session::get($k)); // if not array load it in an array as single element
            }
        }
        Session::forget($k);
    }

    //This part is added
    if (is_array($ret['validation_errors']) && count($ret['validation_errors'])) {
        if (Session::has('validation_errors')) {
            $ret['validation_errors'] = array_merge(Session::get('validation_errors'), $ret['validation_errors']);
        }
    } else {
        $ret['validation_errors'] = Session::get('validation_errors');
    }
    Session::forget('validation_errors');

    return $ret;
}

/**
 * Fill the $ret variable with redirect and session information.
 * This function is used ModuleBaseController to build the return JSON
 *
 * @param $ret
 * @return mixed
 */
function fillRet($ret)
{
    $ret = resolve_redirect($ret);
    $ret = fillFromSession($ret);

    foreach ($ret as $k => $v) {
        if (is_array($v)) {
            if (! count($v)) {
                unset($ret[$k]);
            }
        } else {
            if (! strlen(trim($v))) {
                unset($ret[$k]);
            }
        }
    }

    return $ret;
}

/**
 * Get the redirect url from input parameter redirect_success, redirect_fail
 *
 * @param $ret
 * @return mixed
 */
function resolve_redirect($ret)
{
    switch ($ret['status']) {
        case 'success':
            $ret['redirect'] = Request::has('redirect_success') ? Request::get('redirect_success') : null;
            break;
        case 'fail':
            $ret['redirect'] = Request::has('redirect_fail') ? Request::get('redirect_fail') : null;
            break;
        default :
            $ret['redirect'] = null;
    }

    return $ret;
}

/**
 * @param        $route
 * @param  string  $redirect_success
 * @param  string  $redirect_fail
 * @param  string  $class
 * @param  string  $text
 * @return string
 */
function deleteBtn($route, $redirect_success = '', $redirect_fail = '', $class = 'btn btn-danger flat', $text = 'Delete')
{
    return "<button	name='genericDeleteBtn'
            type='button'
            data-toggle='modal'
            data-target='#deleteModal'
            class='$class'
            data-route='$route'
            data-redirect_success='$redirect_success'
            data-redirect_fail='$redirect_fail'>$text</button>";

}

/**
 * Shorthand function for fetching configuration
 *
 * @param  string  $key
 * @return mixed|null
 */
function conf($key = '')
{
    if (Config::has($key)) {
        return Config::get($key);
    }

    return null;
}

/**
 * Function to return the cache time defined in
 *
 * @param $key
 * @return mixed
 */
function cacheTime($key)
{
    if (env('QUERY_CACHE_ENABLED') == true && Request::get('no_cache') !== 'true') {
        return Config::get('mainframe.query-cache-times.'.$key);
    }
}

/**
 * Spyr framework has settings stored as boolean, string or array(input as json).
 * These settings are stored in Global Settings(gsettings) module. Some of
 * these settings can be over-ridden by tenant. Those tenant specific settings
 * are stored in Tenant Settings(tsettings) module.
 *
 * @param $name
 * @return bool|mixed|string
 */
function setting($name)
{
    $val = $name;

    if (config('var.'.$name, null)) { // Check if setting value exists in config.var
        $val = config('var.'.$name);
    } else {
        $val = Setting::read($name);
    }

    // if ($setting = Tsetting::whereName($name)->remember(cacheTime('long'))->first(['value', 'type'])) {
    //     $val = $setting->value;
    // } else
    //if ($setting = Gsetting::with('uploads')->whereName($name)->remember(cacheTime('long'))->first(['value', 'type'])) {
    // $setting = Gsetting::whereName($name)->remember(cacheTime('long'))->first();
    // if ($setting) {
    //     $val = $setting->settingValue();
    // }
    return $val;
}

/**
 * Renders the left menu of the application and makes the current item active based on breadcrumb
 *
 * @param        $tree
 * @param  string  $current_module_name
 * @param  array  $breadcrumbs
 */
function renderMenuTree($tree, $current_module_name = '', $breadcrumbs = [])
{
    if (is_array($tree)) {
        foreach ($tree as $leaf) {
            $p_name = "perm-".$leaf['type']."-".$leaf['item']->name;

            if (hasPermission($p_name)) {

                // 1. checks if an item has any children
                $has_children = false;
                if (isset($leaf['children']) && count($leaf['children'])) {
                    $has_children = true;
                }

                // set tree view if there is children
                $li_class = '';
                if ($has_children) {
                    $li_class = 'treeview';
                }

                // set url of the item
                $url = '#';
                if (in_array($leaf['type'], ['module', 'module_group'])) {
                    $route = $leaf['item']->name.".index";
                    $url = route($route);
                }

                // matching current breadcrumb of the application set an item as active
                if (array_key_exists($leaf['item']->name, $breadcrumbs)) {
                    $li_class .= " active";
                }

                echo "<li class='$li_class'>";
                echo "<a href=\"$url\"><i class=\"".$leaf['item']->icon_css."\"></i><span>".$leaf['item']->title."</span> ";
                if ($has_children) {
                    echo "<span class=\"pull-right-container\"> <i class=\"fa fa-angle-left pull-right\"></i> </span> ";
                }
                echo "</a>";

                // for children recursively draw the tree
                if ($has_children) {
                    echo "<ul class=\"treeview-menu\">";
                    renderMenuTree($leaf['children'], $current_module_name, $breadcrumbs);
                    echo "</ul>";
                }
                echo "</li>";
            } else {
                // echo "<li class=''>!  $p_name</li>";
            }
        }

        return;
    }
}

/**
 * Returns an array with module/module_group name as key
 *
 * @param  Module|null  $module
 * @return array
 */
function breadcrumb($module = null)
{
    $breadcrumbs = [];
    if ($module) {
        $items = $module->moduleGroupTree();
        foreach ($items as $item) {
            $breadcrumbs[$item->name] = [
                'name' => $item->name,
                'title' => $item->title,
                'route' => "$item->name.index",
                'url' => route("$item->name.index"),
            ];
        }
    }

    return $breadcrumbs;
}

/**
 * returns absolute path from a relative path
 *
 * @param $relative_path
 * @return string
 */
function absPath($relative_path)
{
    return public_path().$relative_path;
}

/**
 * Show the default error page
 *
 * @param  string  $title
 * @param  string  $body
 * @return $this
 */
function renderStaticPage($title = '', $body = '')
{
    return View::make('template.blank')->with('title', $title)->with('body', $body);
}

/**
 * Show the permission error page
 *
 * @param  string  $body
 * @return $this
 */
function showPermissionErrorPage($body = '')
{
    return renderStaticPage('Permission denied!', $body);
}

/**
 * Show generic error page
 *
 * @param  string  $body
 * @return $this
 */
function showGenericErrorPage($body = '')
{
    return renderStaticPage('Error!', $body);
}

/**
 * Function to quickly create a link to module edit page or index page. This is helpful in printing error message
 * with link to module details page related to the error.
 * Example:
 * <a href="http://{root}/public/moveinrequests/1/edit" target="_blank">Move in request[#1]</a>
 *
 * @param  module|string  $moduleName  module name
 * @param  null  $id
 * @param               $link_text
 * @return string
 */
function mlink($moduleName = '', $id = null, $link_text = null)
{

    //$model = model($name);
    if ($module = Module::remember(cacheTime('very-long'))->whereName($moduleName)->first()) {
        if ($id) {
            $link_text = $link_text ? $link_text."[#$id]" : $module->title."[#$id]";

            return "<a href='".route($moduleName.'.edit', $id)."' target='_blank' >$link_text</a> ";
        }

        $link_text = $link_text ? $link_text : $module->title;

        return "<a href='".route($moduleName.'.index')."' target='_blank' >$link_text</a> ";
    }
}

/**
 * Get an element from module_id and element_id, This function is helpful in modules where it relates
 * to multiple other modules. ie. uploads, messages etc.
 *
 * @param $module_id
 * @param $element_id
 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
 */
function element($module_id, $element_id)
{
    $Model = model(Module::where('id', $module_id)->pluck('name'));

    /** @var $Model \App\Superhero */
    return $Model::find($element_id);
}

/**
 * Get Model name From module id
 *
 * @param $module_id
 * @return string
 */
function modelNameFromModuleId($module_id)
{
    return model(moduleNameFromId($module_id));
}

/**
 * Returns module name from id.
 *
 * @param $module_id
 * @return mixed|string
 */
function moduleNameFromId($module_id)
{
    if ($module = Module::remember(cacheTime('very-long'))->find($module_id)) {
        return $module->name;
    }
}

/**
 * Generates report URL for the RUN button in reports module
 *
 * @param  type  $id
 * @return string
 */

function getReportUrlFromId($id)
{
    return Report::getReportUrlFromId($id);
}

/**
 * @param $id
 * @return bool|string
 */
function getReportApiUrlFromId($id)
{
    return Report::getReportUrlFromId($id);
}

/**
 * Creates an API url from browser inputs/url
 *
 * @return mixed
 */
function reportApiUrl()
{
    // return str_replace('public/reportgenerator/2.0', 'public/api/1.0/reportgenerator/2.0', URL::full() . '&ret=json');

    return str_replace(route('home'), route('home').'api/1.0/', URL::full());
}

/**
 * Generate an API url based on the current complete url of a generic report.
 * This route is only accessible for based on X-Auth-Token based authentication.
 * General logged in users do not have access to this url.
 *
 * @return string
 */
function genericReportApiUrl()
{
    $str = str_replace(route('home'), route('home').'/api/1.0', URL::full());
    //$str = str_replace('public/', 'public/api/1.0/', URL::full());
    if (! str_contains($str, "submit=Run")) {
        $str .= "&submit=Run";
    }

    return $str;
}

/**
 * Generates an URL that returns JSON response. Any logged in user can access this URL to
 * get a JSON output of filtered data from a module table.
 *
 * @return string
 */
function genericReportJsonUrl()
{
    $str = URL::full();
    if (! str_contains($str, "ret=json")) {
        $str .= "&ret=json";
    }

    return $str;
}

/**
 * returns table/view field names as CSV ['field1','field2',...] format.
 *
 * @param $view
 * @return string
 */
function tagsForView($view)
{
    $fields = columsOfTable($view);
    $tags = "";
    foreach ($fields as $field) {
        $tags .= "'$field',";
    }
    $tags = "[".trim($tags, ", ")."]";

    return $tags;

}

/**
 * @param $query \Illuminate\Database\Query\Builder
 * @param $minutes
 * @return mixed
 */
function cachedResult($query, $minutes)
{
    $key = md5($query->toSql().json_encode($query->getBindings()));

    return Cache::remember($key, $minutes, function () use ($query) {
        return $query->get();
    });
}

/**
 * todo: no solution for posgre
 * Function to check whether a database view exists
 *
 * @param $view
 * @return bool
 */
function dbViewExists($view)
{
    // $dbname = Config::get('database.connections.mysql.database');
    // $sql = "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE = 'VIEW' AND TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$view';";
    // $results = result($sql, cacheTime('long'));
    // if (count($results)) return true;
    return false;
}

/**
 * Function to check whether a database table exists
 *
 * @param  array|string  $table  full table name with prefix
 * @return bool
 */
function dbTableExists($table)
{
    // $dbname = Config::get('database.connections.mysql.database');
    // $sql = "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table';";
    // $results = result($sql, cacheTime('long'));
    // if (count($results)) return true;
    // return false;

    return Cache::remember($table.".hasTable", cacheTime('very-long'), function () use ($table) {
        return Schema::hasTable(prefixLess($table));
    });

}

/**
 * Strip prefix from table name
 *
 * @param $table
 * @return mixed
 */
function prefixLess($table)
{
    return str_replace(DB::getTablePrefix(), '', $table);
}

/**
 * Returns the database table column field names in an array. The parameter can be both string or array.
 *
 * @param  array|string  $table  : table name excluding prefix. i.e. 'users'
 * @return array
 */
function columns($table)
{

    $columns = [];
    // Handle parameter as array/non array
    $tables = [];
    if (! is_array($table)) {
        array_push($tables, $table);
    } else {
        $tables = $table;
    }

    foreach ($tables as $table) {
        $table_columns = columsOfTable($table);

        $columns = array_merge($columns, $table_columns);
    }

    return $columns;
}

/**
 * Same as getTableFieldNamesFrmTable - implement SHOW COLUMN
 *
 * @param $table table name without prefix
 * @return array
 */
function columsOfTable($table)
{
    // $fieldNames = [];
    // $sql = "SHOW COLUMNS FROM `$table_name`";
    // $results = result($sql, $timeout = cacheTime('long'));    //$results = DB::select(DB::raw($sql));
    // foreach ($results as $result) {
    //     array_push($fieldNames, $result->Field);
    // }

    return Cache::remember($table.".columsOfTable", cacheTime('very-long'), function () use ($table) {
        return Schema::getColumnListing($table);
    });

}

/**
 * Returns the database table column field names in an array.
 * There exists a columns function that can returns fields
 * of a single table or multple tables if passes as array
 *
 * @param $table  : table name excluding prefix. i.e. 'users'
 * @return array
 */
function fields($table)
{
    return columns($table);
}

/**
 * Adds prefix to a table name. This is useful for raw query. Laravel by default does not
 * require table prefix.
 *
 * @param $table  : table name without prefix
 * @return string Table name with prefix added
 */
function dbTable($table)
{

    if (dbViewExists($table)) {
        return $table;
    } else {
        if (dbTableExists($table)) {
            return $table;
        }
    }

    $table_prefix = DB::getTablePrefix();
    // Checks if table name already has prefix.
    if (strlen($table_prefix) && strpos($table, $table_prefix) !== false) {
        return $table;
    }

    // If no prefix is added then a string is returned by adding a prefix.
    return $table_prefix.$table;
}

/**
 * @param       $Model
 * @param  array  $except  // Todo : adding $except returns a different kind of array.
 * @return array
 * @internal param type $table i.e facilities without table prefix
 */
function getModelFields($Model, $except = [])
{
    $except = [];

    return array_diff(columns(modelTable($Model)), $except);
}

/**
 * Checks if a field exists in a table
 *
 * @param  string  $table
 * @param  string  $column
 * @return bool
 */
function tableHasColumn($table, $column)
{
    if (in_array($column, columns($table))) {
        return true;
    }

    return false;
}

/**
 * get the table name(with prefix) used by a model
 *
 * @param  string  $Model
 * @return string
 */
function modelTable($Model)
{
    return DB::getTablePrefix().str_plural(lcfirst($Model));
}
