<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use Validator;
use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @mixin ModularController
 */
trait RequestHandler
{
    /**
     * Prepare the model, First transform the input and then fill
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
     * Get the Mainframe model Validator on the filled element
     *
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function processor()
    {
        $this->processor = $this->fill()->processor();

        return $this->processor;
    }

    /**
     * Validate and create
     *
     * @return mixed|ModularController
     */
    public function attemptStore()
    {
        if ($this->storeRequestValidator()->fails()) {
            $this->response($this->storeRequestValidator())->failValidation();

            return $this;
        }

        $processor = $this->processor()->create();
        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element; // Get the updated element

        if (! $this->element->save()) {
            $this->response()->fail('Can not save for some reason');

            return $this;
        }

        $this->response()->success();

        return $this;
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\RequestHandler
     */
    public function attemptUpdate()
    {
        if ($this->updateRequestValidator()->fails()) {
            $this->response($this->updateRequestValidator())->failValidation();

            return $this;
        }

        $processor = $this->processor()->update();
        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element; // Get the updated valid element.

        if (! $this->element->save()) {
            $this->response()->fail('Can not be updated for some reason');

            return $this;
        }

        $this->response()->success();

        return $this;
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Features\Modular\ModularController\Traits\RequestHandler
     * @throws \Exception
     */
    public function attemptDestroy()
    {

        if ($this->deleteRequestValidator()->fails()) {
            $this->response($this->deleteRequestValidator())->failValidation();

            return $this;
        }

        $processor = $this->processor();

        if ($processor->delete()->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element; // Save the model once before deleting. .

        $this->element->save();
        if (! $this->element->delete()) {
            $this->response()->fail('Can not deleted for some reason');

            return $this;
        }

        $this->response()->success('Successfully deleted');

        return $this;
    }

    /**
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
     * @return \Illuminate\Validation\Validator
     */
    public function updateRequestValidator()
    {
        return $this->storeRequestValidator();
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function deleteRequestValidator()
    {
        $rules = [];

        return Validator::make(request()->all(), $rules);
    }
}