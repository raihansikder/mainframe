<?php

namespace App\Projects\MyProject\Modules\Users;

use Illuminate\Database\Eloquent\Builder;

/** @mixin \App\User  $this */
trait UserHelper
{

    public function isAdmin()
    {
        return ($this->isA('superuser'));
    }

    /**
     * Get admin users
     *
     * @return \App\User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function adminUsers()
    {

        return \App\User::whereHas('groups', function (Builder $query) {
            $query->whereIn('group_id', [1, 18]);
        })->get();

    }

    /**
     * Get a list of admin user email. These will be used when some event
     * takes place in the system and admins sohuld be notified.
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public static function adminEmails()
    {
        return config('projects.my-project.config.default_email_recipients');
    }

    /**
     * Checks if the user is related to an element.
     *
     * @param  \Illuminate\Database\Eloquent\Model|mixed  $element
     * @return bool
     */
    public function relatesToElement($element)
    {
        // Allow admin
        if ($this->isAdmin()) {
            return true;
        }

        // Check for reseller match
        // if ($this->ofReseller() && isset($element->reseller_id)
        //     && ($this->reseller_id == $element->reseller_id)) {
        //     return true;
        // }

        return false;
    }
}