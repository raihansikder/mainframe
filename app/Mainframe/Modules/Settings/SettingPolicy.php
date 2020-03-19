<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Settings;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SettingPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny($user)
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function view($user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user)
    // {
    //     die("I'm being called in SettingPolicy...");
    //     return false;
    // }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function update($user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function delete($user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function restore($user, $setting)
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  Setting  $setting
     * @return mixed
     */
    // public function forceDelete($user, $setting)
    // {
    //     //
    // }

    /**
     * @param $user User
     * @param $ability
     * @return bool
     */
    // public function before($user, $ability)
    // {
    //
    //     return true;
    // }

}
