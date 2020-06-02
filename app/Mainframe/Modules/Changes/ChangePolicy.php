<?php
/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ChangePolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any changes.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny($user)
    {
        // Sample
        return parent::viewAny($user);
    }

    /**
     * Determine whether the user can view the change.
     *
     * @param  \App\User $user
     * @param  Change $change
     * @return mixed
     */
    // public function view($user, $element) { }

    /**
     * Determine whether the user can create changes.
     *
     * @param  \App\User $user
     * @param  Change $element
     * @return mixed
     */
    // public function create($user, $element = null) { }

    /**
     * Determine whether the user can update the change.
     *
     * @param  \App\User $user
     * @param  Change $element
     * @return mixed
     */
    // public function update($user, $element) { }

    /**
     * Determine whether the user can delete the change.
     *
     * @param  \App\User $user
     * @param  Change $element
     * @return mixed
     */
    // public function delete($user, $element) { }

    /**
     * Determine whether the user can restore the change.
     *
     * @param  \App\User $user
     * @param  Change $element
     * @return mixed
     */
    // public function restore($user, $element) { }

    /**
     * Determine whether the user can permanently delete the change.
     *
     * @param  \App\User $user
     * @param  Change $element
     * @return mixed
     */
    // public function forceDelete($user, $element) { }

}
