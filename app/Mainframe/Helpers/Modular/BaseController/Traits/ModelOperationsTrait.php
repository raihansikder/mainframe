<?php

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

/**
 * @mixin ModuleBaseController
 */
trait ModelOperationsTrait
{
    /**
     * Prepare the model, First transform the input and then fill
     *
     * @return mixed|\App\Mainframe\Helpers\Modular\BaseModule\BaseModule
     */
    public function fillElement()
    {
        $inputs = $this->request->all();

        // Transform $inputs here

        return $this->element->fill($inputs);
    }

    /**
     * Get the Mainframe model Validator on the filled element
     *
     * @return mixed|\App\Mainframe\Helpers\Modular\Validator\ModelValidator
     */
    public function initModelValidator()
    {
        $this->validator = $this->fillElement()->validator();

        return $this->validator;
    }

    /**
     * Validate and create
     *
     * @return mixed|ModuleBaseController
     */
    public function attemptStore()
    {
        $validator = $this->initModelValidator();

        if ($validator->creating()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $validator->element; // Get the updated element

        if (! $this->element->save()) {
            return $this->fail('Can not save for some reason', 200);
        }

        return $this->success('Successfully saved.', 200);
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController
     */
    public function attemptUpdate()
    {
        $validator = $this->initModelValidator();

        if ($validator->updating()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $validator->element; // Get the updated valid element.

        if (! $this->element->save()) {
            return $this->fail('Can not update for some reason', 200);
        }

        return $this->success('Successfully saved.', 200);
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController
     * @throws \Exception
     */
    public function attemptDestroy()
    {
        $validator = $this->initModelValidator();

        if ($validator->deleting()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $validator->element; // Save the model once before deleting. .

        $this->element->save();
        if (! $this->element->delete()) {
            return $this->fail('Can not delete for some reason', 200);
        }

        return $this->success('Successfully deleted.', 200);
    }

}