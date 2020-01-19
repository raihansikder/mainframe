<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class TenantPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any tenants.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the tenant.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Tenant  $tenant
     * @return mixed
     */
    // public function view($user, $tenant) { }

    /**
     * Determine whether the user can create tenants.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the tenant.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Tenant  $tenant
     * @return mixed
     */
    // public function update(User $user, $tenant) { }

    /**
     * Determine whether the user can delete the tenant.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Tenant  $tenant
     * @return mixed
     */
    // public function delete(User $user, $tenant) { }

    /**
     * Determine whether the user can restore the tenant.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Tenant  $tenant
     * @return mixed
     */
    // public function restore(User $user, $tenant) { }

    /**
     * Determine whether the user can permanently delete the tenant.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Tenant  $tenant
     * @return mixed
     */
    // public function forceDelete(User $user, $tenant) { }

}
