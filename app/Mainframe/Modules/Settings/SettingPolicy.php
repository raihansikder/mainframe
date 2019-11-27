<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SettingPolicy extends BaseModulePolicy
{

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
     * @param  Setting  $setting
     * @return mixed
     */
    // public function view(User $user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user)
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function update(User $user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function delete(User $user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function restore(User $user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function forceDelete(User $user, $setting)
    // {
    //     //
    // }

}
