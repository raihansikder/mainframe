<?php

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\Mainframe\Modules\Users\Traits\UserPolicyTrait;

class UserPolicy extends BaseModulePolicy
{
    use UserPolicyTrait;

    /*
    |--------------------------------------------------------------------------
    | Note : Keep this empty! Write codes in Trait.
    |--------------------------------------------------------------------------
    |
    | For default mainframe modules keep this empty. Write codes in Trait so
    | that the logic is portable and can be included  in new project modules
    |
    */
}
