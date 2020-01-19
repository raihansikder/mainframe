<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SuperHeroPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any superHeroes.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the superHero.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function view($user, $superHero) { }

    /**
     * Determine whether the user can create superHeroes.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the superHero.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function update(User $user, $superHero) { }

    /**
     * Determine whether the user can delete the superHero.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function delete(User $user, $superHero) { }

    /**
     * Determine whether the user can restore the superHero.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function restore(User $user, $superHero) { }

    /**
     * Determine whether the user can permanently delete the superHero.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  SuperHero  $superHero
     * @return mixed
     */
    // public function forceDelete(User $user, $superHero) { }

}
