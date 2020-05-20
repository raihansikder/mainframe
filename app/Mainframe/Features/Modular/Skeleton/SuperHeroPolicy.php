<?php
/** @noinspection PhpInconsistentReturnPointsInspection */
/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SuperHeroPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any superHeroes.
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
     * Determine whether the user can view the superHero.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function view($user, $superHero) { }

    /**
     * Determine whether the user can create superHeroes.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function create($user, $superHero = null) { }

    /**
     * Determine whether the user can update the superHero.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function update($user, $superHero) { }

    /**
     * Determine whether the user can delete the superHero.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function delete($user, $superHero) { }

    /**
     * Determine whether the user can restore the superHero.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function restore($user, $superHero) { }

    /**
     * Determine whether the user can permanently delete the superHero.
     *
     * @param  \App\User $user
     * @param  SuperHero $superHero
     * @return mixed
     */
    // public function forceDelete($user, $superHero) { }

}
