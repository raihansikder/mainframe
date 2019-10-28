<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Changes;

use App\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class ChangePolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any changes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the change.
     *
     * @param  \App\User  $user
     * @param  Change  $change
     * @return mixed
     */
    // public function view(User $user, $change) { }

    /**
     * Determine whether the user can create changes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the change.
     *
     * @param  \App\User  $user
     * @param  Change  $change
     * @return mixed
     */
    // public function update(User $user, $change) { }

    /**
     * Determine whether the user can delete the change.
     *
     * @param  \App\User  $user
     * @param  Change  $change
     * @return mixed
     */
    // public function delete(User $user, $change) { }

    /**
     * Determine whether the user can restore the change.
     *
     * @param  \App\User  $user
     * @param  Change  $change
     * @return mixed
     */
    // public function restore(User $user, $change) { }

    /**
     * Determine whether the user can permanently delete the change.
     *
     * @param  \App\User  $user
     * @param  Change  $change
     * @return mixed
     */
    // public function forceDelete(User $user, $change) { }

}
