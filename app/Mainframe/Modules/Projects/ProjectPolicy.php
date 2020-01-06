<?php
/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Projects;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ProjectPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any projects.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function view(User $user, $project) { }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function update(User $user, $project) { }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function delete(User $user, $project) { }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function restore(User $user, $project) { }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function forceDelete(User $user, $project) { }

}
