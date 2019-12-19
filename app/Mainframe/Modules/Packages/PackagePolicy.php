<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Packages;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class PackagePolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any packages.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the package.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Package  $package
     * @return mixed
     */
    // public function view(User $user, $package) { }

    /**
     * Determine whether the user can create packages.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the package.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Package  $package
     * @return mixed
     */
    // public function update(User $user, $package) { }

    /**
     * Determine whether the user can delete the package.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Package  $package
     * @return mixed
     */
    // public function delete(User $user, $package) { }

    /**
     * Determine whether the user can restore the package.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Package  $package
     * @return mixed
     */
    // public function restore(User $user, $package) { }

    /**
     * Determine whether the user can permanently delete the package.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Package  $package
     * @return mixed
     */
    // public function forceDelete(User $user, $package) { }

}
