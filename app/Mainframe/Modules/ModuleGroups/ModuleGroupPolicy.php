<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\ModuleGroups;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ModuleGroupPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any moduleGroups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the moduleGroup.
     *
     * @param  \App\User  $user
     * @param  ModuleGroup  $moduleGroup
     * @return mixed
     */
    // public function view($user, $moduleGroup) { }

    /**
     * Determine whether the user can create moduleGroups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the moduleGroup.
     *
     * @param  \App\User  $user
     * @param  ModuleGroup  $moduleGroup
     * @return mixed
     */
    // public function update(User $user, $moduleGroup) { }

    /**
     * Determine whether the user can delete the moduleGroup.
     *
     * @param  \App\User  $user
     * @param  ModuleGroup  $moduleGroup
     * @return mixed
     */
    // public function delete(User $user, $moduleGroup) { }

    /**
     * Determine whether the user can restore the moduleGroup.
     *
     * @param  \App\User  $user
     * @param  ModuleGroup  $moduleGroup
     * @return mixed
     */
    // public function restore(User $user, $moduleGroup) { }

    /**
     * Determine whether the user can permanently delete the moduleGroup.
     *
     * @param  \App\User  $user
     * @param  ModuleGroup  $moduleGroup
     * @return mixed
     */
    // public function forceDelete(User $user, $moduleGroup) { }

}
