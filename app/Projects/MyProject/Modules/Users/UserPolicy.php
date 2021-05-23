<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Users\Traits\UserPolicyTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModulePolicy;

class UserPolicy extends BaseModulePolicy
{
    use UserPolicyTrait;

    /**
     * Determine whether the user can view any Users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny($user) { return parent::viewAny($user); }

    /**
     * Determine whether the user can view the superHero.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function view($user, $element) {if (! parent::view($user, $element)) {return false;} return true;}

    /**
     * Determine whether the user can create Users.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function create($user, $element = null) {if (! parent::create($user, $element)) {return false;} return true;}

    /**
     * Determine whether the user can update the superHero.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function update($user, $element) {if (! parent::update($user, $element)) {return false;} return true;}

    /**
     * Determine whether the user can delete the superHero.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function delete($user, $element) {if (! parent::delete($user, $element)) {return false;} return true;}

    /**
     * Determine whether the user can restore the superHero.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function restore($user, $element) {if (! parent::restore($user, $element)) {return false;} return true;}

    /**
     * Determine whether the user can permanently delete the superHero.
     *
     * @param  \App\User  $user
     * @param  User  $element
     * @return mixed
     */
    // public function forceDelete($user, $element) {if (! parent::forceDelete($user, $element)) {return false;} return true;}

}
