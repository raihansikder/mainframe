<?php

namespace App\Mainframe\Modules\Users\Traits;

use Illuminate\Support\Str;
use App\Mainframe\Modules\Groups\Group;

trait UserGroupable
{

    /**
     * Checks if user belongs to a certain groupId
     *
     * @param $group_id
     * @return bool
     */
    public function inGroupId($group_id)
    {
        return in_array($group_id, $this->group_ids);
    }

    /**
     * Checks if user belongs to one of the following
     *
     * @param $group_ids array
     * @return bool
     */
    public function inGroupIds($group_ids = [])
    {
        foreach ($group_ids as $group_id) {
            if ($this->inGroupId($group_id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Find if the user belongs to all the groups.
     *
     * @param  array  $group_ids
     * @return bool
     */
    public function inAllGroupIds($group_ids = [])
    {
        foreach ($group_ids as $group_id) {
            if (! $this->inGroupId($group_id)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if the user is a super user - has
     * access to everything regardless of permissions.
     *
     * @return bool
     */
    public function isSuperUser()
    {
        return $this->hasPermission('superuser') || $this->inGroupId(Group::SUPERUSER);
    }

    /**
     * Checks if the user is a super user - has
     * access to everything regardless of permissions.
     *
     * @return bool
     */
    public function isApiUser()
    {
        return $this->hasPermission('superuser') || $this->inGroupId(Group::SUPERUSER);
    }

    /**
     * Returns an array of merged permissions for each
     * group the user is in.
     *
     * @return array
     */
    public function getMergedPermissions()
    {
        $permissions = [];
        foreach ($this->groups as $group) {
            $permissions = array_merge($permissions, $group->permissions);
        }

        return array_merge($permissions, $this->permissions);
    }

    /**
     * See if a user has access to the passed permission(s).
     * Permissions are merged from all groups the user belongs to
     * and then are checked against the passed permission(s).
     * If multiple permissions are passed, the user must
     * have access to all permissions passed through, unless the
     * "all" flag is set to false.
     * Super users have access no matter what.
     *
     * @param  string|array  $permissions
     * @param  bool  $all
     * @return bool
     */
    public function hasAccess($permissions, $all = true)
    {
        if ($this->isSuperUser()) {
            return true;
        }

        return $this->hasPermission($permissions, $all);
    }

    /**
     * See if a user has access to the passed permission(s).
     * Permissions are merged from all groups the user belongs to
     * and then are checked against the passed permission(s).
     * If multiple permissions are passed, the user must
     * have access to all permissions passed through, unless the
     * "all" flag is set to false.
     * Super users DON'T have access no matter what.
     *
     * @param  string|array  $permissions
     * @param  bool  $all
     * @return bool
     */
    public function hasPermission($permissions, $all = true)
    {
        $mergedPermissions = $this->getMergedPermissions();

        foreach ((array) $permissions as $permission) {
            // We will set a flag now for whether this permission was
            // matched at all.
            $matched = true;

            // Now, let's check if the permission ends in a wildcard "*" symbol.
            // If it does, we'll check through all the merged permissions to see
            // if a permission exists which matches the wildcard.
            if ((strlen($permission) > 1) && Str::endsWith($permission, '*')) {
                $matched = false;

                foreach ($mergedPermissions as $mergedPermission => $value) {
                    // Strip the '*' off the end of the permission.
                    $checkPermission = substr($permission, 0, -1);

                    // We will make sure that the merged permission does not
                    // exactly match our permission, but starts with it.
                    if ($checkPermission != $mergedPermission && Str::startsWith($mergedPermission, $checkPermission) and $value == 1) {
                        $matched = true;
                        break;
                    }
                }
            } else {
                if ((strlen($permission) > 1) && Str::startsWith($permission, '*')) {
                    $matched = false;

                    foreach ($mergedPermissions as $mergedPermission => $value) {
                        // Strip the '*' off the beginning of the permission.
                        $checkPermission = substr($permission, 1);

                        // We will make sure that the merged permission does not
                        // exactly match our permission, but ends with it.
                        if ($checkPermission != $mergedPermission && Str::endsWith($mergedPermission, $checkPermission) and $value == 1) {
                            $matched = true;
                            break;
                        }
                    }
                } else {
                    $matched = false;

                    foreach ($mergedPermissions as $mergedPermission => $value) {
                        // This time check if the mergedPermission ends in wildcard "*" symbol.
                        if ((strlen($mergedPermission) > 1) && Str::endsWith($mergedPermission, '*')) {
                            $matched = false;

                            // Strip the '*' off the end of the permission.
                            $checkMergedPermission = substr($mergedPermission, 0, -1);

                            // We will make sure that the merged permission does not
                            // exactly match our permission, but starts with it.
                            if ($checkMergedPermission != $permission && Str::startsWith($permission, $checkMergedPermission) && $value == 1) {
                                $matched = true;
                                break;
                            }
                        }

                        // Otherwise, we'll fallback to standard permissions checking where
                        // we match that permissions explicitly exist.
                        else {
                            if ($permission == $mergedPermission and $mergedPermissions[$permission] == 1) {
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

        return ! ($all === false);
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