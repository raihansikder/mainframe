<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Uploads;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class UploadPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any uploads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the upload.
     *
     * @param  \App\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function view($user, $upload) { }

    /**
     * Determine whether the user can create uploads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the upload.
     *
     * @param  \App\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function update($user, $upload) { }

    /**
     * Determine whether the user can delete the upload.
     *
     * @param  \App\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function delete($user, $upload) { }

    /**
     * Determine whether the user can restore the upload.
     *
     * @param  \App\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function restore($user, $upload) { }

    /**
     * Determine whether the user can permanently delete the upload.
     *
     * @param  \App\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function forceDelete($user, $upload) { }

}
