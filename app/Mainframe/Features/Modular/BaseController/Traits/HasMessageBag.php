<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use Illuminate\Support\MessageBag;

trait HasMessageBag
{

    /** @var MessageBag */
    public $messageBag;

    public function messageBag()
    {
        $this->messageBag = resolve(MessageBag::class);

        return $this->messageBag;
    }
}