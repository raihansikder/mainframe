<?php

namespace App\Mainframe\Modules\Users\Traits;

trait UserPolicyTrait
{
    /**
     * Check if user can access Api
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function makeApiCall($user)
    {
        if (! $user->hasPermission('make-api-call')) {
            return false;
        }

        return true;
    }

    /**
     * @param  \App\User  $user
     * @param  \App\User  $element
     * @return bool
     */
    public function updateToken($user, $element)
    {
        if (! $user->isSuperUser() || $user->isA('app-admin')) {
            return true;
        }

        return false;
    }
}