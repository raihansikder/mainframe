<?php

namespace App\Mainframe\Modules\Groups;

trait GroupHelper
{
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * See if a group has access to the passed permission(s).
     * If multiple permissions are passed, the group must
     * have access to all permissions passed through, unless the
     * "all" flag is set to false.
     *
     * @param  string|array  $permissions
     * @param  bool  $all
     * @return bool
     */
    public function hasAccess($permissions, $all = true)
    {
        $groupPermissions = $this->getPermissions();

        foreach ((array) $permissions as $permission) {
            // We will set a flag now for whether this permission was
            // matched at all.
            $matched = true;

            // Now, let's check if the permission ends in a wildcard "*" symbol.
            // If it does, we'll check through all the merged permissions to see
            // if a permission exists which matches the wildcard.
            if ((strlen($permission) > 1) and ends_with($permission, '*')) {
                $matched = false;

                foreach ($groupPermissions as $groupPermission => $value) {
                    // Strip the '*' off the end of the permission.
                    $checkPermission = substr($permission, 0, -1);

                    // We will make sure that the merged permission does not
                    // exactly match our permission, but starts with it.
                    if ($checkPermission != $groupPermission and starts_with($groupPermission, $checkPermission) and $value == 1) {
                        $matched = true;
                        break;
                    }
                }
            }

            // Now, let's check if the permission starts in a wildcard "*" symbol.
            // If it does, we'll check through all the merged permissions to see
            // if a permission exists which matches the wildcard.
            else {
                if ((strlen($permission) > 1) and starts_with($permission, '*')) {
                    $matched = false;

                    foreach ($groupPermissions as $groupPermission => $value) {
                        // Strip the '*' off the start of the permission.
                        $checkPermission = substr($permission, 1);

                        // We will make sure that the merged permission does not
                        // exactly match our permission, but ends with it.
                        if ($checkPermission != $groupPermission and ends_with($groupPermission, $checkPermission) and $value == 1) {
                            $matched = true;
                            break;
                        }
                    }
                } else {
                    $matched = false;

                    foreach ($groupPermissions as $groupPermission => $value) {
                        // This time check if the groupPermission ends in wildcard "*" symbol.
                        if ((strlen($groupPermission) > 1) and ends_with($groupPermission, '*')) {
                            $matched = false;

                            // Strip the '*' off the end of the permission.
                            $checkGroupPermission = substr($groupPermission, 0, -1);

                            // We will make sure that the merged permission does not
                            // exactly match our permission, but starts wtih it.
                            if ($checkGroupPermission != $permission and starts_with($permission, $checkGroupPermission) and $value == 1) {
                                $matched = true;
                                break;
                            }
                        }

                        // Otherwise, we'll fallback to standard permissions checking where
                        // we match that permissions explicitly exist.
                        else {
                            if ($permission == $groupPermission and $groupPermissions[$permission] == 1) {
                                $matched = true;
                                break;
                            }
                        }
                    }
                }
            }

            // Now, we will check if we have to match all
            // permissions or any permission and return
            // accordingly.
            if ($all === true and $matched === false) {
                return false;
            }

            if ($all === false and $matched === true) {
                return true;
            }
        }

        return $all;

    }

    /**
     * Returns if the user has access to any of the
     * given permissions.
     *
     * @param  array  $permissions
     * @return bool
     */
    public function hasAnyAccess(array $permissions)
    {
        return $this->hasAccess($permissions, false);
    }

}