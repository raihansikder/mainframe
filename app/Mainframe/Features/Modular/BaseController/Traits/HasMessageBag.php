<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use Illuminate\Support\MessageBag;

trait HasMessageBag
{

    public function messageBag()
    {
        return resolve(MessageBag::class);
    }
}