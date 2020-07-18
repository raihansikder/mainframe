<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use Illuminate\Support\Str;

/**
 * @mixin ModularController
 */
trait ModelProcessorHelper
{
    /**
     * Transform request inputs
     *
     * This function is useful when you don't want to exactly
     * store a model field as it is in the request. Sometimes
     * the request may be an array that you want to transform
     * into a string and then save.
     *
     * @return array
     */
    public function transformRequest()
    {
        $inputs = request()->all();

        return $inputs;
    }

    /**
     * Fill the element with transformed request inputs.
     *
     * @return $this
     */
    public function fill()
    {

        $this->element->fill($this->transformRequest());

        return $this;
    }

    /**
     * After filling the model with request instantiate the
     * model processor that will be responsible for doing
     * various logical checking and computation of the model.
     *
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function processor()
    {
        $this->processor = $this->element->processor();

        return $this->processor;
    }

    /**
     * Validate and attempt to store. First level of validation involves
     * the raw request validation. The next validation is done through
     * model processor that applies business logic and prepares the
     * model for saving.
     *
     * @return mixed|ModularController
     */
    public function attemptStore()
    {
        // Before going to processor and model run an initial validation in controller.
        if (! $this->validateStoreRequest()) {

            return $this;
        }

        // If request is valid then only call processor which also calls model save.
        $processor = $this->fill()->processor()->save();

        // Return error if save fails due to validation errors
        if ($processor->isInvalid()) {
            $this->setValidator($processor->validator);

            return $this;
        }

        $this->success('The '.Str::singular($this->module->title).' has been saved');

        $this->stored();
        $this->saved();

        return $this;
    }

    /**
     * This function is called after successful store operation.
     *
     */
    public function stored()
    {
        // echo 'In Controller stored(). ';
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\ModelProcessorHelper
     */
    public function attemptUpdate()
    {

        // Before going to processor and model run an initial validation in controller.
        if (! $this->validateUpdateRequest()) {

            return $this;
        }

        // If request is valid then only call processor which also calls model save.
        $processor = $this->fill()->processor()->save();

        // Return error if save fails due to validation errors
        if ($processor->isInvalid()) {
            $this->setValidator($processor->validator);

            return $this;
        }

        // Set response flag and message.
        $this->success('The '.Str::singular($this->module->title).' has been updated');

        $this->updated();
        $this->saved();

        return $this;
    }

    /**
     * After successful update
     */
    public function updated()
    {
        // echo 'In Controller updated(). ';
    }

    /**
     * After successful update
     */
    public function saved()
    {
        // echo 'In Controller updated(). ';
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\ModelProcessorHelper
     * @throws \Exception
     */
    public function attemptDestroy()
    {
        // Before going to processor and model run an initial validation in controller.
        if (! $this->validateDeleteRequest()) {

            return $this;
        }

        // If request is valid then only call processor which also calls model delete.
        $processor = $this->fill()->processor()->delete();

        // Return error if save fails due to validation errors
        if ($processor->isInvalid()) {
            $this->setValidator($processor->validator);

            return $this;
        }

        // Set response flag and message.
        $this->success('The '.Str::singular($this->module->title).' is deleted');

        // Execute controller stored() function for any post save operation in controller.
        $this->deleted();

        return $this;
    }

    /**
     * After successful delete
     */
    public function deleted()
    {
        // echo 'In Controller deleted(). ';
    }

}