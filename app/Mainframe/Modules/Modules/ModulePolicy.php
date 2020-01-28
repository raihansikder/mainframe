<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Modules;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ModulePolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user)
    {
        //
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    // public function view($user, $element)
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
    //     //
    // }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    // public function update($user, $element)
    // {
    //     //
    // }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    // public function delete($user, $element)
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    // public function restore($user, $element)
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return mixed
     */
    // public function forcedelete($user, $element)
    // {
    //     //
    // }


}
