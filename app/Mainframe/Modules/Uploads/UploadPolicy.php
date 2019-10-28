<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class UploadPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any uploads.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the upload.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function view(User $user, $upload) { }

    /**
     * Determine whether the user can create uploads.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the upload.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function update(User $user, $upload) { }

    /**
     * Determine whether the user can delete the upload.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function delete(User $user, $upload) { }

    /**
     * Determine whether the user can restore the upload.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function restore(User $user, $upload) { }

    /**
     * Determine whether the user can permanently delete the upload.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Upload  $upload
     * @return mixed
     */
    // public function forceDelete(User $user, $upload) { }

}
