<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class UserPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any users.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  User  $user
     * @return mixed
     */
    // public function view(User $user, $user) { }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  User  $user
     * @return mixed
     */
    // public function update(User $user, $user) { }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  User  $user
     * @return mixed
     */
    // public function delete(User $user, $user) { }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  User  $user
     * @return mixed
     */
    // public function restore(User $user, $user) { }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  User  $user
     * @return mixed
     */
    // public function forceDelete(User $user, $user) { }

}
