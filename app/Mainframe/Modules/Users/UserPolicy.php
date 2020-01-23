<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class UserPolicy extends BaseModulePolicy
{

    /**
     * Check if user can access Api
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function makeApiCall($user)
    {
        if (! $user->hasPermission('make-api-call')) {
            return false;
        }

        return true;
    }
}
