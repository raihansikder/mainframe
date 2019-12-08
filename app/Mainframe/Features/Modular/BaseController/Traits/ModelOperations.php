<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

/**
 * @mixin ModuleBaseController
 */
trait ModelOperations
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
     * @return mixed|ModuleBaseController
     */
    public function attemptStore()
    {
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
     * @return \App\Mainframe\Features\Modular\BaseController\Traits\ModelOperations
     */
    public function attemptUpdate()
    {
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
     * @return \App\Mainframe\Features\Modular\BaseController\Traits\ModelOperations
     * @throws \Exception
     */
    public function attemptDestroy()
    {
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

        $this->response()->success();

        return $this;
    }

}