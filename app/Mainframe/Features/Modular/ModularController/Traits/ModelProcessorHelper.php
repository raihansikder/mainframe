<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\ModularController\ModularController;

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
        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        /*
         *  Post save operations
         */
        // If there is no validation error in processor return the filled
        // and processed element back to controller. This is eventually
        // returned to view or API payload.
        $this->element = $processor->element;

        // Set response flag and message.
        $this->success();

        // Execute controller stored() function for any post save operation in controller.
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
    // public function validateStoreProcessor()
    // {
    //     $processor = $this->processor()->forCreate();
    //
    //     if ($processor->invalid()) {
    //         $this->response($processor->validator)->failValidation();
    //
    //         return false;
    //     }
    //
    //     $this->element = $processor->element; // Get the updated element
    //
    //     return true;
    // }

    /**
     * This cunftion is called after successful store operation.
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
        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        $this->element = $processor->element;

        // Todo: Older implementation
        // if (! $this->validateUpdateProcessor()) {
        //     return $this;
        // }
        //
        // if (! $this->element->save()) {
        //     $this->fail('Can not be updated for some reason');
        //     return $this;
        // }

        /*
        *  Post save operations
        */
        // If there is no validation error in processor return the filled
        // and processed element back to controller. This is eventually
        // returned to view or API payload.

        // Set response flag and message.
        $this->success();

        // Execute controller stored() function for any post save operation in controller.
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
    // public function validateUpdateProcessor()
    // {
    //     $processor = $this->processor()->forUpdate();
    //
    //     if ($processor->invalid()) {
    //         $this->response($processor->validator)->failValidation();
    //
    //         return false;
    //     }
    //
    //     $this->element = $processor->element; // Get the updated element
    //
    //     return true;
    // }

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
        if ($processor->invalid()) {
            $this->response($processor->validator)->failValidation();

            return $this;
        }

        /*
         *  Post save operations
         */
        // If there is no validation error in processor return the filled
        // and processed element back to controller. This is eventually
        // returned to view or API payload.
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

        // Set response flag and message.
        $this->success('Successfully deleted');

        // Execute controller stored() function for any post save operation in controller.
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
    // public function validateDeleteProcessor()
    // {
    //
    //     $processor = $this->processor()->forDelete();
    //
    //     if ($processor->invalid()) {
    //         $this->response($processor->validator)->failValidation();
    //
    //         return false;
    //     }
    //
    //     $this->element = $processor->element; // Get the updated element
    //
    //     return true;
    // }

    /**
     * After successful delete
     */
    public function deleted()
    {
        // echo 'In Controller deleted(). ';
    }

}