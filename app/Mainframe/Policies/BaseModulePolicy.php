<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Policies;

use App\User;
use App\Mainframe\BaseModule;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaseModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\BaseModule  $setting
     * @return mixed
     */
    public function view(User $user, BaseModule $setting)
    {
        //
    }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\BaseModule  $element
     * @return mixed
     */
    public function update(User $user, BaseModule $element)
    {

    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\BaseModule  $element
     * @return mixed
     */
    public function delete(User $user, BaseModule $element)
    {
        //
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\BaseModule  $element
     * @return mixed
     */
    public function restore(User $user, BaseModule $element)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\BaseModule  $element
     * @return mixed
     */
    public function forceDelete(User $user, BaseModule $element)
    {
        //
    }

    /**
     * @param $user User
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
