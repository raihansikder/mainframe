<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class CountryPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any countries.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the country.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function view(User $user, $country) { }

    /**
     * Determine whether the user can create countries.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the country.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function update(User $user, $country) { }

    /**
     * Determine whether the user can delete the country.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function delete(User $user, $country) { }

    /**
     * Determine whether the user can restore the country.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function restore(User $user, $country) { }

    /**
     * Determine whether the user can permanently delete the country.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function forceDelete(User $user, $country) { }

}
