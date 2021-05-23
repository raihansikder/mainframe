<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Users\Traits\UserObserverTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleObserver;

class UserObserver extends BaseModuleObserver
{
    use UserObserverTrait;

    /**
     * @param  \App\Mainframe\Modules\Users\User  $element
     * @return void|bool
     */
    // public function saving($element) { }
    // public function creating($element) { }
    // public function created($element) { }
    // public function updating($element) { }
    // public function updated($element) { }
    // public function saved($element) { }
    // public function deleting($element) { }
    // public function deleted($element) { }
    // public function restored($element) { }
    // public function forceDeleted($element) { }

}