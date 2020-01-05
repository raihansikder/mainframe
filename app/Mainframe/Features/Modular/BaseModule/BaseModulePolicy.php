<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Modules\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaseModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function view(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function update(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function delete(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    public function restore(User $user, $element)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
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
