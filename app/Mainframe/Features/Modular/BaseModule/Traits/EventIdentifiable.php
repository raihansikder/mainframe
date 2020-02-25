<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;
/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this  */
trait EventIdentifiable
{
    public function isCreating()
    {
        return ! $this->isUpdating();
    }

    public function isUpdating()
    {
        return isset($this->id);
    }
}