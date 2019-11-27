<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Modules\Changes\Change;
use App\Mainframe\Modules\Uploads\Upload;

class BaseModuleObserver
{

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @throws \Exception
     */
    public function saving($element)
    {
        $element = fillModel($element);         // This line should be placed just before return

        Change::keepChangesInSession($element); // store change log

        //Validate
        /*$validator = $element->validateModel();
        if ($validator->fails()) {
            Session::set('validation_errors', json_decode($validator->messages(), true));
            return setError('Failed update - ' . get_class($element));
        }*/
    }

    /**
     * This function is executed during a model's saving() phase
     *
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return bool
     */
    public function saved($element)
    {
        Upload::linkTemporaryUploads($element);            //
        Change::storeChangesFromSession("", $element, ""); // Take changes from session and store in changes table
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return bool
     */
    public function updating($element)
    {
        // Restrict change in fields where change is not allowed.
        // However new value can be set if there is no original value.
        // -----------------------------------------------------
        // foreach ($element->restrictedUpdates() as $field) {
        //     if ((isset($element->$field) && $element->getOriginal($field) != null) && ($element->$field != $element->getOriginal($field))) {
        //         return setError("$field can not be further changed.");
        //     }
        // }
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function created($element)
    {
        Change::storeCreateLog($element);
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return bool
     */
    public function deleting($element)
    {
        // if (!validForeignReferenceForDelete(get_class($element), $element->id)) {
        //     return setError('Error validForeignReferenceForDelete');
        // }
    }

    /**
     * Handle the base module "deleted" event.
     *
     * @param  $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void
     */
    public function deleted($element)
    {
        // $table = $element->module()->name;
        // if (user()) DB::table($table)->withTrashed()->where('id', $element->id)->update(['deleted_by' => user()->id]);
    }

    /**
     * Handle the base module "restored" event.
     *
     * @param  $element
     * @return void
     */
    public function restored($element)
    {
        //
    }

    /**
     * Handle the base module "force deleted" event.
     *
     * @param  $element
     * @return void
     */
    public function forceDeleted($element)
    {
        //
    }
}
