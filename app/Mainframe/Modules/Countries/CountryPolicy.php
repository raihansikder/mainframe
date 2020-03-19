<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Countries;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class CountryPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any countries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the country.
     *
     * @param  \App\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function view($user, $country) { }

    /**
     * Determine whether the user can create countries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the country.
     *
     * @param  \App\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function update($user, $country) { }

    /**
     * Determine whether the user can delete the country.
     *
     * @param  \App\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function delete($user, $country) { }

    /**
     * Determine whether the user can restore the country.
     *
     * @param  \App\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function restore($user, $country) { }

    /**
     * Determine whether the user can permanently delete the country.
     *
     * @param  \App\User  $user
     * @param  Country  $country
     * @return mixed
     */
    // public function forceDelete($user, $country) { }

}
