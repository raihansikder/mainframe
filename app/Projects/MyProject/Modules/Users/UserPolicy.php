<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Projects\MyProject\Modules\Users;

class UserPolicy extends \App\Mainframe\Modules\Users\UserPolicy
{
    /**
     * Determine whether the user can view any clients.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny($user)
    {
        if (! parent::viewAny($user)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed $element
     * @return mixed
     */
    public function view($user, $element)
    {
        if (! $user->hasPermission($this->moduleName.'-view')) {
            return false;
        }
        // Inactive reseller can not see user list
        if ($user->ofReseller() && ! $user->reseller->is_active && $user->id != $element->id) {
            return false;
        }
        // Inactive vendor can not see user list
        if ($user->ofVendor() && ! $user->vendor->is_active && $user->id != $element->id) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed $element
     * @return mixed
     */
    public function create($user, $element = null)
    {

        if (! $user->hasPermission($this->moduleName.'-create')) {
            return false;
        }
        //if user is a reseller user he does not have create permission
        if ($user->isA('reseller-user')) {
            return false;
        }
        //if user is a vendor user he does not have create permission
        if ($user->isA('vendor-user')) {
            return false;
        }
        //if user is a sales-member he does not have create permission
        //if user is a vendor user he does not have create permission

        return true;

    }

    /**
     * @param \App\User $user
     * @param \App\User $element
     * @return bool
     */
    public function updateToken($user, $element)
    {
        if (! $user->isSuperUser() || $user->isA('app-admin')) {
            return true;
        }

        return false;
    }

}
