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
     * Disable model events while saving.
     *
     * @param  array  $options
     * @return mixed
     */
    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->save($options);
        });
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