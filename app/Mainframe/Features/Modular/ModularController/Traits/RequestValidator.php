<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use Validator;

/**
 * @mixin ModularController
 */
trait RequestValidator
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
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function fill()
    {
        $inputs = request()->all();

        // Transform $inputs here

        return $this->element->fill($inputs);
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