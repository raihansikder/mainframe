<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Samples\LoremIpsums;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class LoremIpsumPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any loremIpsums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the loremIpsum.
     *
     * @param  \App\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function view($user, $loremIpsum) { }

    /**
     * Determine whether the user can create loremIpsums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the loremIpsum.
     *
     * @param  \App\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function update($user, $loremIpsum) { }

    /**
     * Determine whether the user can delete the loremIpsum.
     *
     * @param  \App\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function delete($user, $loremIpsum) { }

    /**
     * Determine whether the user can restore the loremIpsum.
     *
     * @param  \App\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function restore($user, $loremIpsum) { }

    /**
     * Determine whether the user can permanently delete the loremIpsum.
     *
     * @param  \App\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function forceDelete($user, $loremIpsum) { }

}
