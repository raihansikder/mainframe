<?php

use App\Mainframe\Features\Mf;

/**
 * returns sentry object of currently logged in user
 *
 * @param  bool|null  $user_id
 * @return \Illuminate\Contracts\Auth\Authenticatable|\App\Mainframe\Modules\Users\User
 */
function user($user_id = null)
{
    return Mf::user($user_id);
}


/**
 * Renders a multi-dimentional array of permissions in hiararchical order for assigning permission
 * The $tree can be generated from ModuleGroup::tree()
 *
 * @param $tree  : ModuleGroup::tree()
 * @return string
 */
function renderModulePermissionTree($tree)
{
    $html = '';
    if (is_array($tree)) {
        $html .= "<ul>";
        foreach ($tree as $leaf) {
            // $perm = 'perm-'.$leaf['type'].'-'.$leaf['item']->name;
            $perm = $leaf['item']->name;
            $val = $perm;

            $html .= "<div class='clearfix'></div><li class='pull-left'>".
                "<input name='permission[]' type='checkbox' v-model='permission' value='$val'
				v-on:click='clicked'/>".
                "<label><b>".$leaf['item']->title."</b> - <small>".$leaf['item']->desc."</small></label> <div class='clearfix'></div>";

            if ($leaf['type'] === 'module') {
                $module_default_permissions_suffixes = [
                    'view-list' => 'View grid',
                    'view-details' => 'View details',
                    'create' => 'Create',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                    'restore' => 'Restore',
                    'change-logs' => 'Access change logs',
                    'report' => 'Report',
                ];

                $html .= "<ul class='pull-left module-permissions'>";
                foreach ($module_default_permissions_suffixes as $k => $v) {
                    $val = "$perm-$k";
                    $html .= "<li>".
                        "<input name='permission[]' type='checkbox' v-model='permission'  value='$val'/>".
                        "<label>".$v."</label>".
                        "</li>";
                }
                $html .= "</ul>";
            }

            if (isset($leaf['children']) && count($leaf['children'])) {
                $html .= renderModulePermissionTree($leaf['children']);
            }
            $html .= "</li>";
        }
        $html .= "</ul>";

        return $html;
    }
}


/**
 * This is a similar function to sentry's hasAccess. checks if current user has access to a certain permission
 *
 * @param           $permission
 * @param  bool|null  $user_id
 * @return bool
 */
function hasAccess($permission, $user_id = false)
{
    //return true;
    $allowed = false;
    $user = user($user_id);

    if (isset($user)) {
        if (! Session::has('permissions')) {
            storePermissionsInSession();
        }
        storePermissionsInSession(); // Force store permission

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
 * Same as has access
 *
 * @param            $permission
 * @param  bool|false  $user_id
 * @return bool
 */
function hasPermission($permission, $user_id = false)
{
    return hasAccess($permission, $user_id);
}

/**
 * Short hand function to check module specific permissions
 *
 * @param            $moduleName
 * @param            $permission
 * @param  bool|false  $user_id
 * @return bool
 */
function hasModulePermission($moduleName, $permission, $user_id = false)
{
    return hasAccess("perm-module-$moduleName-$permission", $user_id);
}

/**
 * Stores currently logged in users permission in session as array.
 */
function storePermissionsInSession()
{
    if (user()) {
        Session::put('permissions', user()->getMergedPermissions());
    }
}