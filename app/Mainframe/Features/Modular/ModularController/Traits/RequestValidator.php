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
     * During creation, before utilizing the model, this function runs a raw
     * validation on the values available in the request. This allows us to
     * invalidate a request event before it invokes the models internal logic.
     *
     * @return bool
     */
    public function validateStoreRequest()
    {
        if ($this->storeRequestValidator()->fails()) {
            $this->mergeValidatorErrors($this->storeRequestValidator());

            return false;
        }

        if ($this->saveRequestValidator()->fails()) {
            $this->mergeValidatorErrors($this->saveRequestValidator());

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


            $this->mergeValidatorErrors($this->updateRequestValidator());

            return false;
        }



        if ($this->saveRequestValidator()->fails()) {

            $this->mergeValidatorErrors($this->saveRequestValidator());

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
            $this->mergeValidatorErrors($this->deleteRequestValidator());

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
            // 'lorem' => 'required',
        ];

        $message = [
            //'password.regex' => "The password field should be mix of letters and numbers.",
        ];

        $validator = Validator::make(request()->all(), $rules, $message);

        //$this->fieldError('name','Error Lorem Ipsum'); // Sample error message.

        return $validator;
    }

    /**
     * Laravel rule based validator that is called during update.
     * This only validates the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function updateRequestValidator()
    {
        $rules = [
            //'name' => 'required',
        ];

        $message = [
            //'password.regex' => "The password field should be mix of letters and numbers.",
        ];

        $validator = Validator::make(request()->all(), $rules, $message);

        //$this->fieldError('name','Error Lorem Ipsum'); // Sample error message.

        return $validator;
    }

    /**
     * Laravel rule based validator that is called during save or update.
     * This is a common place to write validation rules that apply
     * for both create and update.
     * This only validates the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function saveRequestValidator()
    {
        $rules = [
            //'name' => 'required',
        ];

        $message = [
            //'password.regex' => "The password field should be mix of letters and numbers.",
        ];

        $validator = Validator::make(request()->all(), $rules, $message);

        //$this->fieldError('name','Error Lorem Ipsum'); // Sample error message.

        return $validator;
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