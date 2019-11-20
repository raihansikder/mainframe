<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\DolorSits;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class DolorSitPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any dolorSits.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the dolorSit.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function view(User $user, $dolorSit) { }

    /**
     * Determine whether the user can create dolorSits.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the dolorSit.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function update(User $user, $dolorSit) { }

    /**
     * Determine whether the user can delete the dolorSit.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function delete(User $user, $dolorSit) { }

    /**
     * Determine whether the user can restore the dolorSit.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function restore(User $user, $dolorSit) { }

    /**
     * Determine whether the user can permanently delete the dolorSit.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function forceDelete(User $user, $dolorSit) { }

}
