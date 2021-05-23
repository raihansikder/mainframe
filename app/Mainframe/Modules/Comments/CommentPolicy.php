<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\Mainframe\Modules\Comments\Traits\CommentPolicyTrait;

class CommentPolicy extends BaseModulePolicy
{
    use CommentPolicyTrait;

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
