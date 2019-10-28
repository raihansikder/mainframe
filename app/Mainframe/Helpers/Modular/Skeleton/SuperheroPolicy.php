<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Superheroes;

use App\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class SuperheroPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any superheros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the superhero.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function view(User $user, $superhero) { }

    /**
     * Determine whether the user can create superheros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the superhero.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function update(User $user, $superhero) { }

    /**
     * Determine whether the user can delete the superhero.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function delete(User $user, $superhero) { }

    /**
     * Determine whether the user can restore the superhero.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function restore(User $user, $superhero) { }

    /**
     * Determine whether the user can permanently delete the superhero.
     *
     * @param  \App\User  $user
     * @param  Superhero  $superhero
     * @return mixed
     */
    // public function forceDelete(User $user, $superhero) { }

}
