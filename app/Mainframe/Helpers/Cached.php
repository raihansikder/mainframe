<?php

namespace App\Mainframe\Helpers;

use App\Mainframe\Features\Cacher\Cacher;

class Cached extends Cacher
{

    /*-----------------------------------------------------
    | Section: Function for getting cached results
    |----------------------------------------------------*/
    /**
     * logged-user-group-name
     * @param  null  $seconds
     * @return mixed
     * @throws \Exception
     */
    public function loggedUserGroupName($seconds = null)
    {
        $seconds = $seconds ?? timer('long');

        $key = $this->key(__FUNCTION__).user()->id; // Create unique key for user

        return \Cache::remember($key, $seconds, function () {
            return ucfirst(user()->group->title);
        });
    }

}