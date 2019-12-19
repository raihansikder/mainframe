<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\ProductCategories;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ProductCategoryPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any productCategories.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the productCategory.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductCategory  $productCategory
     * @return mixed
     */
    // public function view(User $user, $productCategory) { }

    /**
     * Determine whether the user can create productCategories.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the productCategory.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductCategory  $productCategory
     * @return mixed
     */
    // public function update(User $user, $productCategory) { }

    /**
     * Determine whether the user can delete the productCategory.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductCategory  $productCategory
     * @return mixed
     */
    // public function delete(User $user, $productCategory) { }

    /**
     * Determine whether the user can restore the productCategory.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductCategory  $productCategory
     * @return mixed
     */
    // public function restore(User $user, $productCategory) { }

    /**
     * Determine whether the user can permanently delete the productCategory.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  ProductCategory  $productCategory
     * @return mixed
     */
    // public function forceDelete(User $user, $productCategory) { }

}
