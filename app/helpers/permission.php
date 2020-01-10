<?php

// /**
//  * This is a similar function to sentry's hasAccess. checks if current user has access to a certain permission
//  *
//  * @param           $permission
//  * @param  bool|null  $user_id
//  * @return bool
//  */
// function hasAccess($permission, $user_id = false)
// {
//
//     //return true;
//     $allowed = false;
//     $user = user($user_id);
//
//     if (isset($user)) {
//         if (! Session::has('permissions')) {
//             storePermissionsInSession();
//         }
//         storePermissionsInSession(); // Force store permission
//
//         $permissions = Session::get('permissions');
//         if ((isset($permissions['superuser']) && $permissions['superuser'] == 1)) { // allow for super user
//             $allowed = true;
//         } else {
//             if (isset($permissions[$permission]) && $permissions[$permission] == 1) { // allow based on specific permission
//                 $allowed = true;
//             }
//         }
//     } else {
//         Session::push('permissions', "Undefined user - '$permission'");
//     }
//
//     return $allowed;
// }
//
// /**
//  * Same as has access
//  *
//  * @param            $permission
//  * @param  bool|false  $user_id
//  * @return bool
//  */
// function hasPermission($permission, $user_id = false)
// {
//     return hasAccess($permission, $user_id);
// }
//
// /**
//  * Short hand function to check module specific permissions
//  *
//  * @param            $moduleName
//  * @param            $permission
//  * @param  bool|false  $user_id
//  * @return bool
//  */
// function hasModulePermission($moduleName, $permission, $user_id = false)
// {
//     return hasAccess("perm-module-$moduleName-$permission", $user_id);
// }
//
// /**
//  * Stores currently logged in users permission in session as array.
//  */
// function storePermissionsInSession()
// {
//     if (user()) {
//         Session::put('permissions', user()->getMergedPermissions());
//     }
// }
//
