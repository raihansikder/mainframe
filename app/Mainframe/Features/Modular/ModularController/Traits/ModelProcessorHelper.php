<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @mixin ModularController
 */
trait ModelProcessorHelper
{
    /**
     * Transform request input and fill.
     *
     * First transform the input and then fill.
     * This function is useful when you don't want to exactly
     * store a model field as it is in the request. Sometimes
     * the request may be an array that you want to transform
     * into a string and then save.
     *
     * @return mixed|ModularController
     */
    public function fill()
    {
        $inputs = request()->all();

        // Transform $inputs here

        $this->element->fill($inputs);

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
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        // Set response flag and message.
        $this->success();

        // Execute controller stored() function for any post save operation in controller.
        $this->stored();

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
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        // Set response flag and message.
        $this->success();

        // Execute controller stored() function for any post save operation in controller.
        $this->updated();

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
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        // Set response flag and message.
        $this->success('Successfully deleted');

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