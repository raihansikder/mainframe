<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\Mainframe\Modules\Comments\Traits\CommentPolicyTrait;

class CommentPolicy extends BaseModulePolicy
{
    use CommentPolicyTrait;
}
