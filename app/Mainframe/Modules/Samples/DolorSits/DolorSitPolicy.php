<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Samples\DolorSits;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class DolorSitPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any dolorSits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the dolorSit.
     *
     * @param  \App\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function view($user, $dolorSit) { }

    /**
     * Determine whether the user can create dolorSits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the dolorSit.
     *
     * @param  \App\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function update($user, $dolorSit) { }

    /**
     * Determine whether the user can delete the dolorSit.
     *
     * @param  \App\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function delete($user, $dolorSit) { }

    /**
     * Determine whether the user can restore the dolorSit.
     *
     * @param  \App\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function restore($user, $dolorSit) { }

    /**
     * Determine whether the user can permanently delete the dolorSit.
     *
     * @param  \App\User  $user
     * @param  DolorSit  $dolorSit
     * @return mixed
     */
    // public function forceDelete($user, $dolorSit) { }

}
