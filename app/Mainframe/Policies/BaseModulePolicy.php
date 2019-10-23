<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaseModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * @param $user User
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        return $user->isSuperUser();
    }
}
