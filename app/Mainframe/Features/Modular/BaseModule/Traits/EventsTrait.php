<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
trait EventsTrait
{
    /**
     * Check if the model is being created.
     *
     * @return bool
     */
    public function isCreating()
    {
        return ! $this->isUpdating();
    }

    /**
     * Check if the model is being created.
     *
     * @return bool
     */
    public function isUpdating()
    {
        return isset($this->id);
    }

    /**
     * Disable events to avoid infinite loop
     *
     * @return $this
     */
    public function disableEvents()
    {
        /** @var \App\Mainframe\Modules\SuperHeroes\SuperHero $model */
        $model = $this->module()->model;

        $model::unsetEventDispatcher();

        return $this;
    }
}