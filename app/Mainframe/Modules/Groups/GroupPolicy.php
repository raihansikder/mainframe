<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class GroupPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any groups.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the group.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Group  $group
     * @return mixed
     */
    // public function view($user, $group) { }

    /**
     * Determine whether the user can create groups.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the group.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Group  $group
     * @return mixed
     */
    // public function update(User $user, $group) { }

    /**
     * Determine whether the user can delete the group.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Group  $group
     * @return mixed
     */
    // public function delete(User $user, $group) { }

    /**
     * Determine whether the user can restore the group.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Group  $group
     * @return mixed
     */
    // public function restore(User $user, $group) { }

    /**
     * Determine whether the user can permanently delete the group.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Group  $group
     * @return mixed
     */
    // public function forceDelete(User $user, $group) { }

}
