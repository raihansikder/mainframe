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

        /**/
        $processor = $this->processor()->save();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }
        $this->element = $processor->element;
        /**/

        // if (! $this->validateStoreProcessor()) {
        //
        //     return $this;
        // }
        //
        // if (! $this->element->save()) {
        //     $this->fail('Can not save for some reason');
        //
        //     return $this;
        // }

        $this->success();
        $this->stored();

        return $this;
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
     * After successful store
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

        if (! $this->validateUpdateRequest()) {

            return $this;
        }

        /**/
        $processor = $this->processor()->save();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element;
        /**/
        //
        // if (! $this->validateUpdateProcessor()) {
        //
        //     return $this;
        // }
        //
        // if (! $this->element->save()) {
        //     $this->fail('Can not be updated for some reason');
        //
        //     return $this;
        // }

        $this->success();
        $this->updated();

        return $this;
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

        if (! $this->validateDeleteRequest()) {

            return $this;
        }

        /**/
        $processor = $this->processor()->delete();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element;

        /**/
        // if (! $this->validateDeleteProcessor()) {
        //
        //     return $this;
        // }
        //
        // $this->element->saveQuietly(); // Save the model once before deleting to store deleted_by
        //
        // if (! $this->element->delete()) {
        //     $this->fail('Can not deleted for some reason');
        //
        //     return $this;
        // }

        $this->success('Successfully deleted');
        $this->deleted();

        return $this;
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

        $processor = $this->processor()->forDelete();

        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return false;
        }

        $this->element = $processor->element; // Get the updated element

        return true;
    }

    /**
     * After successful delete
     */
    public function deleted()
    {
        // echo 'In Controller deleted(). ';
    }

}