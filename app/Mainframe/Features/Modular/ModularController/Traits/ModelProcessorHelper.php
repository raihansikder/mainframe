<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use Validator;

/**
 * @mixin ModularController
 */
trait ModelProcessorHelper
{

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
        if (! $this->validateStoreRequest()) {

            return $this;
        }

        if (! $this->validateStoreProcessor()) {

            return $this;
        }

        if (! $this->element->save()) {
            $this->fail('Can not save for some reason');

            return $this;
        }

        $this->success();
        $this->stored();

        return $this;
    }

    /**
     * After successful store
     */
    public function stored()
    {
        $this->processor->created($this->element);
        $this->processor->saved($this->element);
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\ModelProcessorHelper
     */
    public function attemptUpdate()
    {

        if (! $this->validateUpdateRequest()) {

            return $this;
        }

        if (! $this->validateUpdateProcessor()) {

            return $this;
        }

        if (! $this->element->save()) {
            $this->fail('Can not be updated for some reason');

            return $this;
        }

        $this->success();
        $this->updated();

        return $this;
    }

    /**
     * After successful update
     */
    public function updated()
    {
        $this->processor->updated($this->element);
        $this->processor->saved($this->element);
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\ModelProcessorHelper
     * @throws \Exception
     */
    public function attemptDestroy()
    {

        if (! $this->validateDeleteRequest()) {

            return $this;
        }

        if (! $this->validateDeleteProcessor()) {

            return $this;
        }

        $this->element->saveQuietly(); // Save the model once before deleting to store deleted_by

        if (! $this->element->delete()) {
            $this->fail('Can not deleted for some reason');

            return $this;
        }

        $this->success('Successfully deleted');
        $this->deleted();

        return $this;
    }

    /**
     * After successful delete
     */
    public function deleted()
    {
        $this->processor->deleted($this->element);
    }
    /**
     * Transform request input and fill.
     *
     * First transform the input and then fill.
     * This function is useful when you don't want to exactly
     * store a model field as it is in the request. Sometimes
     * the request may be an array that you want to transform
     * into a string and then save.
     *
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function fill()
    {
        $inputs = request()->all();

        // Transform $inputs here

        return $this->element->fill($inputs);
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
        $this->processor = $this->fill()->processor();

        return $this->processor;
    }

    /**
     * Validate the model by the processors create logic.
     * During this process the original element may get updated, filled
     * or changed in various ways based on business logic. Finally
     * the processor returns a final model that is populated with
     * correct data and ready to be stored.
     *
     * @return bool
     */
    public function validateStoreProcessor()
    {
        $processor = $this->processor()->forCreate();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return false;
        }

        $this->element = $processor->element; // Get the updated element

        return true;
    }

    /**
     * Validate the model by the processors update logic.
     * During this process the original element may get updated, filled
     * or changed in various ways based on business logic. Finally
     * the processor returns a final model that is populated with
     * correct data and ready to be stored.
     *
     * @return bool
     */
    public function validateUpdateProcessor()
    {
        $processor = $this->processor()->forUpdate();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return false;
        }

        $this->element = $processor->element; // Get the updated element

        return true;
    }

    /**
     * Validate the model by the processors delete logic.
     * During this process the original element may get updated, filled
     * or changed in various ways based on business logic. Finally
     * the processor returns a final model that is populated with
     * correct data and ready to be stored.
     *
     * @return bool
     */
    public function validateDeleteProcessor()
    {

        $processor = $this->processor()->delete();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return false;
        }

        $this->element = $processor->element; // Get the updated element

        return true;
    }

    /**
     * During creation, before utilizing the model, this function runs a raw
     * validation on the values available in the request. This allows us to
     * invalidate a request event before it invokes the models internal logic.
     *
     * @return bool
     */
    public function validateStoreRequest()
    {
        if ($this->storeRequestValidator()->fails()) {
            $this->response($this->storeRequestValidator())->failValidation();

            return false;
        }

        return true;

    }

    /**
     * During update, before utilizing the model, this function runs a raw
     * validation on the values available in the request. This allows us to
     * invalidate a request event before it invokes the models internal logic.
     *
     * @return bool
     */
    public function validateUpdateRequest()
    {
        if ($this->updateRequestValidator()->fails()) {
            $this->response($this->updateRequestValidator())->failValidation();

            return false;
        }

        return true;

    }

    /**
     * During deletion, before utilizing the model, this function runs a raw
     * validation on the values available in the request. This allows us to
     * invalidate a request event before it invokes the models internal logic.
     *
     * @return bool
     */
    public function validateDeleteRequest()
    {
        if ($this->deleteRequestValidator()->fails()) {
            $this->response($this->deleteRequestValidator())->failValidation();

            return false;
        }

        return true;

    }

    /**
     * Laravel rule based validator that is called during store.
     * This only validates the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function storeRequestValidator()
    {
        $rules = [
            //'name' => 'required',
        ];

        $message = [
            //'password.regex' => "The password field should be mix of letters and numbers.",
        ];

        $this->validator = Validator::make(request()->all(), $rules, $message);

        //$this->fieldError('name','Error Lorem Ipsum'); // Sample error message.

        return $this->validator;
    }

    /**
     * Laravel rule based validator that is called during update.
     * This only validates the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function updateRequestValidator()
    {
        return $this->storeRequestValidator();
    }

    /**
     * Laravel rule based validator that is called during delete.
     * This only validates the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function deleteRequestValidator()
    {
        $rules = [];

        return Validator::make(request()->all(), $rules);
    }
}