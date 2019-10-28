<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Helpers\Modular\BaseModule;

use App\User;
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
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function view(User $user, $element)
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
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function update(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function delete(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function restore(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function forceDelete(User $user, $element)
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
        return $user->isSuperUser();
    }
}
