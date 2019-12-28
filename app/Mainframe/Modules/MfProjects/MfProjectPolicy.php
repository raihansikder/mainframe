<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\MfProjects;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class MfProjectPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any mfProjects.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the mfProject.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  MfProject  $mfProject
     * @return mixed
     */
    // public function view(User $user, $mfProject) { }

    /**
     * Determine whether the user can create mfProjects.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the mfProject.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  MfProject  $mfProject
     * @return mixed
     */
    // public function update(User $user, $mfProject) { }

    /**
     * Determine whether the user can delete the mfProject.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  MfProject  $mfProject
     * @return mixed
     */
    // public function delete(User $user, $mfProject) { }

    /**
     * Determine whether the user can restore the mfProject.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  MfProject  $mfProject
     * @return mixed
     */
    // public function restore(User $user, $mfProject) { }

    /**
     * Determine whether the user can permanently delete the mfProject.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  MfProject  $mfProject
     * @return mixed
     */
    // public function forceDelete(User $user, $mfProject) { }

}
