<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Comments\Traits\CommentObserverTrait;

class CommentObserver extends BaseModuleObserver
{
    use CommentObserverTrait;
}