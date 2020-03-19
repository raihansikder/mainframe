<?php
/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Projects;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ProjectPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function view($user, $project) { }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function update($user, $project) { }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function delete($user, $project) { }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function restore($user, $project) { }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\User  $user
     * @param  Project  $project
     * @return mixed
     */
    // public function forceDelete($user, $project) { }

}
