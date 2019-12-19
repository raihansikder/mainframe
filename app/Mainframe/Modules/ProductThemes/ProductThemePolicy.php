<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\ProductThemes;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ProductThemePolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any productThemes.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the productTheme.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductTheme  $productTheme
     * @return mixed
     */
    // public function view(User $user, $productTheme) { }

    /**
     * Determine whether the user can create productThemes.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the productTheme.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductTheme  $productTheme
     * @return mixed
     */
    // public function update(User $user, $productTheme) { }

    /**
     * Determine whether the user can delete the productTheme.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductTheme  $productTheme
     * @return mixed
     */
    // public function delete(User $user, $productTheme) { }

    /**
     * Determine whether the user can restore the productTheme.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductTheme  $productTheme
     * @return mixed
     */
    // public function restore(User $user, $productTheme) { }

    /**
     * Determine whether the user can permanently delete the productTheme.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductTheme  $productTheme
     * @return mixed
     */
    // public function forceDelete(User $user, $productTheme) { }

}
