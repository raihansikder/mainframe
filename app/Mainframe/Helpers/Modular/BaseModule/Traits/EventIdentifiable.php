<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;
/** @mixin $this BaseModule */
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