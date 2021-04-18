<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\SuperHero;

class SuperHeroPolicy extends BaseModulePolicy
{
    // Note: Pull in necessary traits from relevant mainframe class

    /**
     * view-any
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny($user) { return parent::viewAny($user); }

    /**
     * view
     *
     * @param  \App\User  $user
     * @param  \App\SuperHero  $element
     * @return mixed
     */
    // public function view($user, $element) {if (! parent::view($user, $element)) {return false;} return true;}
    // public function create($user, $element = null) {if (! parent::create($user, $element)) {return false;} return true;}
    // public function update($user, $element) {if (! parent::update($user, $element)) {return false;} return true;}
    // public function delete($user, $element) {if (! parent::delete($user, $element)) {return false;} return true;}
    // public function restore($user, $element) {if (! parent::restore($user, $element)) {return false;} return true;}
    // public function forceDelete($user, $element) {if (! parent::forceDelete($user, $element)) {return false;} return true;}

}
