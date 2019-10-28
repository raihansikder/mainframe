<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Superheros;

use App\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class SuperheroPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function view(User $user, $superhero) { }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function update(User $user, $superhero) { }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function delete(User $user, $superhero) { }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function restore(User $user, $superhero) { }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function forceDelete(User $user, $superhero) { }

}
