<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Modules;

use App\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class ModulePolicy extends BaseModulePolicy
{

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
     * @param  Module  $setting
     * @return mixed
     */
    public function view(User $user, Module $setting)
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
     * @param  Module  $setting
     * @return mixed
     */
    public function update(User $user, Module $setting)
    {

    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  Module  $setting
     * @return mixed
     */
    public function delete(User $user, Module $setting)
    {
        //
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  Module  $setting
     * @return mixed
     */
    public function restore(User $user, Module $setting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  Module  $setting
     * @return mixed
     */
    public function forceDelete(User $user, Module $setting)
    {
        //
    }

}
