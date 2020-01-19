<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Samples\LoremIpsums;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class LoremIpsumPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any loremIpsums.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the loremIpsum.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function view($user, $loremIpsum) { }

    /**
     * Determine whether the user can create loremIpsums.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the loremIpsum.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function update(User $user, $loremIpsum) { }

    /**
     * Determine whether the user can delete the loremIpsum.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function delete(User $user, $loremIpsum) { }

    /**
     * Determine whether the user can restore the loremIpsum.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function restore(User $user, $loremIpsum) { }

    /**
     * Determine whether the user can permanently delete the loremIpsum.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  LoremIpsum  $loremIpsum
     * @return mixed
     */
    // public function forceDelete(User $user, $loremIpsum) { }

}
