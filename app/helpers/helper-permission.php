<?php

use App\User;

/**
 * Renders a multi-dimentional array of permissions in hiararchical order for assigning permission
 * The $tree can be generated from ModuleGroup::tree()
 *
 * @param $tree  : ModuleGroup::tree()
 */
function renderModulePermissionTree($tree)
{
    if (is_array($tree)) {
        echo "<ul>";
        foreach ($tree as $leaf) {
            // $perm = 'perm-'.$leaf['type'].'-'.$leaf['item']->name;
            $perm = $leaf['item']->name;
            $val = $perm;

            echo "<div class='clearfix'></div><li class='pull-left'>".
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

                echo "<ul class='pull-left module-permissions'>";
                foreach ($module_default_permissions_suffixes as $k => $v) {
                    $val = "$perm-$k";
                    echo "<li>".
                        "<input name='permission[]' type='checkbox' v-model='permission'  value='$val'/>".
                        "<label>".$v."</label>".
                        "</li>";
                }
                echo "</ul>";
                /*
                if ($leaf['item']->has_uploads) {
                    $file_permission_suffixes = [
                        'files-view-list' => 'View file list',
                        'files-view-details' => 'View file details',
                        'files-create' => 'File upload',
                        'files-edit' => 'File edit',
                        'files-delete' => 'File delete',
                        'files-download' => 'File download',
                    ];
                    echo "<ul class='pull-left '>";
                    foreach ($file_permission_suffixes as $k => $v) {
                        $val = "$perm-$k";
                        echo "<li>" .
                            "<input name='permission[]' type='checkbox' v-model='permission'  value='$val'/>" .
                            "<label>" . $v . "</label>" .
                            "</li>";
                    }
                    echo "</ul>";
                }

                if ($leaf['item']->has_messages) {
                    $message_permission_suffixes = [
                        'messages-view-list' => 'View message list',
                        'messages-create' => 'View create',
                        'messages-edit' => 'Message edit',
                        'messages-delete' => 'Message delete',
                    ];
                    echo "<ul class='pull-left '>";
                    foreach ($message_permission_suffixes as $k => $v) {
                        $val = "$perm-$k";
                        echo "<li>" .
                            "<input name='permission[]' type='checkbox' v-model='permission'  value='$val'/>" .
                            "<label>" . $v . "</label>" .
                            "</li>";
                    }
                    echo "</ul>";
                }
                */
            }

            if (isset($leaf['children']) && count($leaf['children'])) {
                renderModulePermissionTree($leaf['children']);
            }
            echo "</li>";
        }
        echo "</ul>";

        return;
    }
}

/**
 * returns sentry object of currently logged in user
 *
 * @param  bool|false  $user_id
 * @return \Illuminate\Contracts\Auth\Authenticatable|\App\User
 */
function user($user_id = false)
{
    if ($user_id) {
        /** @noinspection PhpUndefinedMethodInspection */
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

    return null;
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
 * Checks if an spyr element(model) is creatable by a user
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function spyrElementCreatable($element, $user_id = null, $set_msg = false)
{
    $valid = true;
    $moduleName = elementModule($element);
    $user = user($user_id); // get the currently logged in user

    // First check sentry permission
    if (! hasModulePermission($moduleName, 'create', $user->id)) {
        $valid = setError("User[".$user->name."] does not have create permission on module: $moduleName [".$element->id."]", $set_msg);
    }

    // Check for valid tenant context
    if ($valid && (inTenantContext($moduleName) && ! elementBelongsToSameTenant($element))) {
        $valid = setError("User[".$user->name."] does not create permission on module: $moduleName [".$element->id."] because the element does not belong to same user",
            $set_msg);
    }

    return $valid;
}

/**
 * Checks if an spyr element(model) is viewable by a user
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function spyrElementViewable($element, $user_id = null, $set_msg = false)
{
    $valid = true;
    $moduleName = elementModule($element);
    $user = user($user_id); // get the currently logged in user

    // First check sentry permission
    if (! hasModulePermission($moduleName, 'view-details', $user->id)) {
        $valid = setError("User[".$user->name."] does not have view permission on module: $moduleName [".$element->id."]", $set_msg);
    }

    // Check for valid tenant context
    if ($valid && (inTenantContext($moduleName) && ! elementBelongsToSameTenant($element))) {
        $valid = setError("User[".$user->name."] does not have view permission on module: $moduleName [".$element->id."] because the element does not belong to same user",
            $set_msg);
    }

    return $valid;
}

/**
 * Checks if an spyr element(model) is editable by a user
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function spyrElementEditable($element, $user_id = null, $set_msg = false)
{
    $valid = true;
    $moduleName = elementModule($element);
    $user = user($user_id); // get the currently logged in user

    // First check sentry permission
    if ($valid && ! hasModulePermission($moduleName, 'edit', $user->id)) {
        $valid = setError("User[".$user->name."] does not have edit permission on module: $moduleName [".$element->id."]", $set_msg);
    }
    // Check for valid tenant context
    if ($valid) {
        $valid = editableInTenantContext($element, $user->id, $set_msg);
    }

    return $valid;
}

/**
 * Checks if an spyr element(model) is deletable by a user
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function spyrElementDeletable($element, $user_id = null, $set_msg = false)
{
    $valid = true;
    $moduleName = elementModule($element);
    $user = user($user_id); // get the currently logged in user

    // First check sentry permission
    if ($valid && ! hasModulePermission($moduleName, 'delete', $user->id)) {
        $valid = setError("User[".$user->name."] does not have delete permission on module: $moduleName [".$element->id."]", $set_msg);
    }

    // Check for valid tenant context
    if ($valid) {
        $valid = editableInTenantContext($element, $user->id, $set_msg);
    }

    return $valid;
}

/**
 * Checks if an spyr element(model) is deletable by a user
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function spyrElementRestorable($element, $user_id = null, $set_msg = false)
{
    $valid = true;
    $moduleName = elementModule($element);
    $user = user($user_id); // get the currently logged in user

    // First check sentry permission
    if ($valid && ! hasModulePermission($moduleName, 'restore', $user->id)) {
        $valid = setError("User[".$user->name."] does not have restore permission on module: $moduleName [".$element->id."]", $set_msg);
    }
    // Check for valid tenant context
    if ($valid) {
        $valid = editableInTenantContext($element, $user->id, $set_msg);
    }

    return $valid;
}

/**
 * Some elements are system enforced and not allowed to be editable by tenant.
 *
 * @param      $element
 * @param  bool  $set_msg
 * @return bool
 */
function editableByTenant($element, $set_msg = false)
{
    $valid = true;
    if (isset($element->is_editable_by_tenant) && $element->is_editable_by_tenant == 0) {
        $valid = setError("This is a system entry and not editable by tenant user ", $set_msg);
    }

    return $valid;
}

/**
 * This function checks if a user has correct tenant context of an element and the elemnet
 * is not a system reserved element.
 *
 * @param      $element
 * @param  null  $user_id
 * @param  bool  $set_msg
 * @return bool
 */
function editableInTenantContext($element, $user_id = null, $set_msg = false)
{
    $user = user($user_id); // get the currently logged in user
    $moduleName = elementModule($element);
    $valid = true;

    if (inTenantContext($moduleName, $user->id)) {
        if (! elementBelongsToSameTenant($element, $user->id)) {
            $valid = setError("User[".$user->name."] can not edit : $moduleName [".$element->id."] because it does not belong to this user", $set_msg);
        } else {
            $valid = editableByTenant($element, $set_msg);
        }
    }

    return $valid;
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