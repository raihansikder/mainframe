<?php

namespace App\Projects\MyProject\Helpers;

class Cached extends \App\Mainframe\Helpers\Cached
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
        // $seconds = $seconds ?? timer('long');
        return \Cache::remember(kebab_case(__FUNCTION__), $seconds, function () {
            return ucfirst(user()->group->title);
        });
    }



}