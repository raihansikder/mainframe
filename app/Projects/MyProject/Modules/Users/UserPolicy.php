<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Projects\MyProject\Modules\Users;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModulePolicy;

class UserPolicy extends BaseModulePolicy
{
    /**
     * Determine whether the user can view any user.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function view($user, $element)
    {
        if (! parent::view($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function create($user, $element = null)
    {

        if (! parent::create($user, $element)) {
            return false;
        }

        //if user is a reseller user he does not have create permission
        // if ($user->isA('reseller-user')) {
        //     return false;
        // }
        //
        return true;

    }

    /**
     * @param  \App\User  $user
     * @param  \App\User  $element
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
