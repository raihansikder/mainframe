<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

/**
 * @mixin ModuleBaseController
 */
trait ModelOperationsTrait
{
    /**
     * Prepare the model, First transform the input and then fill
     *
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function fill()
    {
        // dd(request()->all());
        $inputs = request()->all();

        // Transform $inputs here

        return $this->element->fill($inputs);
    }

    /**
     * Get the Mainframe model Validator on the filled element
     *
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function modelValidator()
    {
        $this->modelValidator = $this->fill()->processor();

        return $this->modelValidator;
    }

    /**
     * Validate and create
     *
     * @return mixed|ModuleBaseController
     */
    public function attemptStore()
    {
        $modelValidator = $this->modelValidator()->create();

        if ($modelValidator->failed()) {
            $this->response->validator = $modelValidator->validator;

            return $this->response->fail('Validation failed', 200);
        }

        $this->element = $modelValidator->element; // Get the updated element

        if (! $this->element->save()) {
            return $this->response->fail('Can not save for some reason', 200);
        }

        return $this->response->success('Successfully saved.', 200);
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Features\Modular\BaseController\ModuleBaseController
     */
    public function attemptUpdate()
    {
        $modelValidator = $this->modelValidator()->update();

        if ($modelValidator->failed()) {
            $this->response->validator = $modelValidator->validator;

            return $this->response->fail('Validation failed', 200);
        }

        $this->element = $modelValidator->element; // Get the updated valid element.

        if (! $this->element->save()) {
            return $this->response->fail('Can not update for some reason', 200);
        }

        return $this->response->success('Successfully saved.', 200);
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Features\Modular\BaseController\ModuleBaseController
     * @throws \Exception
     */
    public function attemptDestroy()
    {
        $modelValidator = $this->modelValidator();

        if ($modelValidator->delete()->failed()) {
            return $this->response->fail('Validation failed', 200);
        }

        $this->element = $modelValidator->element; // Save the model once before deleting. .

        $this->element->save();
        if (! $this->element->delete()) {
            return $this->response->fail('Can not delete for some reason', 200);
        }

        return $this->response->success('Successfully deleted.', 200);
    }

}