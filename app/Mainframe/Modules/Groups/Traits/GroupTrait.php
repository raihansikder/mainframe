<?php

namespace App\Mainframe\Modules\Groups\Traits;

use App\Group;
use App\User;
use InvalidArgumentException;
use Request;
use Illuminate\Database\Eloquent\Builder;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Groups\Traits\GroupDefinitionsTrait;

trait GroupTrait
{

    protected $allowedPermissionsValues = [0, 1];

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    //public function scopePopular($query) { return $query->where('votes', '>', 100); }
    //public function scopeWomen($query) { return $query->whereGender('W'); }
    /*
    Usage: $users = User::popular()->women()->orderBy('created_at')->get();
    */

    //public function scopeOfType($query, $type) { return $query->whereType($type); }
    /*
    Usage:  $users = User::ofType('member')->get();
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /**
     * Accessor for giving permissions.
     *
     * @param  mixed  $permissions
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPermissionsAttribute($permissions)
    {
        if (!$permissions) {
            return [];
        }

        if (is_array($permissions)) {
            return $permissions;
        }

        if (!$_permissions = json_decode($permissions, true)) {
            throw new InvalidArgumentException("Cannot JSON decode permissions [$permissions].");
        }

        return $_permissions;
    }


    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }
    /**
     * Mutator for taking permissions.
     *
     * @param  array  $permissions
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setPermissionsAttribute(array $permissions)
    {
        // Merge permissions
        $permissions = array_merge($this->getPermissions(), $permissions);

        // Loop through and adjust permissions as needed
        foreach ($permissions as $permission => &$value) {
            // Lets make sure their is a valid permission value
            if (!in_array($value = (int) $value, $this->allowedPermissionsValues)) {
                throw new InvalidArgumentException("Invalid value [$value] for permission [$permission] given.");
            }

            // If the value is 0, delete it
            if ($value === 0) {
                unset($permissions[$permission]);
            }
        }

        $this->attributes['permissions'] = (!empty($permissions)) ? json_encode($permissions) : '';
    }
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    | Write model relations (belongsTo,hasMany etc) at the bottom the file
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() { return $this->belongsToMany(User::class, 'user_group'); }

    /**
     * Get group by name
     *
     * @param $name
     * @return \App\Group
     */
    public static function byName($name)
    {
        return Group::where('name', $name)->remember(timer('very-long'))->first();
    }

    /**
     * Get Permissions
     *
     * @return mixed
     */
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

    /**
     * Get superadmin group
     *
     * @return mixed|\App\Group
     */
    public static function superadmin()
    {
        return Group::where('name', 'superuser')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function api()
    {
        return Group::where('name', 'api')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function projectAdmin()
    {
        return Group::where('name', 'project-admin')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function tenantAdmin()
    {
        return Group::where('name', 'tenant-admin')
            ->remember(timer('very-long'))
            ->first();
    }
}