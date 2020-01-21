<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Features\Modular\BaseModule;

use Str;
use App\Mainframe\Modules\Users\User;
use App\Mainframe\Modules\Modules\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaseModulePolicy
{
    use HandlesAuthorization;

    public $moduleName;

    public function __construct()
    {
        $this->moduleName = $this->getModuleName();
    }

    /**
     * Runs before any of the other checks.
     *
     * @param $user User
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
        // Do not return false.
    }

    /**
     * Determine whether the user can view any items.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny($user)
    {

        if (! $user->hasPermission($this->moduleName.'-view-any')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function view($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-view')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function create($user)
    {
        if (! $user->hasPermission($this->moduleName.'-create')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function update($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-update')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function delete($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-delete')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can restore the item.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function restore($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-restore')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can permanently delete the item.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function forceDelete($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-force-delete')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return bool
     */
    public function viewChangeLog($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-view-change-log')) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return bool
     */
    public function viewReport($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-view-report')) {
            return false;
        }

        return true;
    }

    /**
     * Check if user can access Api
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function accessApi(User $user)
    {
        if (! $user->hasPermission($this->moduleName.'-view-report')) {
            return false;
        }

        return true;
    }

    /**
     * Get module name of the policy
     *
     * @return string
     */
    public function getModuleName()
    {
        return Str::plural(str_replace('-policies', '', Module::nameFromClass($this)));
    }

}
