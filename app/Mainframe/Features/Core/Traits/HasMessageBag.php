<?php

namespace App\Mainframe\Features\Core\Traits;

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