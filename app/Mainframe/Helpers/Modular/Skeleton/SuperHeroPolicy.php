<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\SuperHeroes;

use App\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class SuperHeroPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any superHeroes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the superHero.
     *
     * @param  \App\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function view(User $user, $superHero) { }

    /**
     * Determine whether the user can create superHeroes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the superHero.
     *
     * @param  \App\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function update(User $user, $superHero) { }

    /**
     * Determine whether the user can delete the superHero.
     *
     * @param  \App\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function delete(User $user, $superHero) { }

    /**
     * Determine whether the user can restore the superHero.
     *
     * @param  \App\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function restore(User $user, $superHero) { }

    /**
     * Determine whether the user can permanently delete the superHero.
     *
     * @param  \App\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function forceDelete(User $user, $superHero) { }

}
