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
            $this->setValidator($this->storeRequestValidator());

            return false;
        }

        if ($this->saveRequestValidator()->fails()) {
            $this->setValidator($this->saveRequestValidator());

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
            $this->setValidator($this->updateRequestValidator());

            return false;
        }

        if ($this->saveRequestValidator()->fails()) {
            $this->setValidator($this->saveRequestValidator());

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
            $this->setValidator($this->deleteRequestValidator());

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

        $this->validator = Validator::make(request()->all(), $rules, $message);

        //$this->fieldError('name','Error Lorem Ipsum'); // Sample error message.

        return $this->validator;
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