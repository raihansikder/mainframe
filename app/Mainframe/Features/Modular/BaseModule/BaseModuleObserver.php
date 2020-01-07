<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Modules\Uploads\Upload;

class BaseModuleObserver
{

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function saving($element)
    {
        \Session::pull('event');
        $element->autoFill();
        \Session::push('event', 'saving');
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function creating($element)
    {
        // Change::storeCreateLog($element);
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function created($element)
    {
        // Change::storeCreateLog($element);
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
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
        \Session::push('event', 'updating');
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function updated($element)
    {
        // Change::storeCreateLog($element);
        \Session::push('event', 'updated');
    }

    /**
     * This function is executed during a model's saving() phase
     *
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function saved($element)
    {
        Upload::linkTemporaryUploads($element);            //
        // Change::storeChangesFromSession("", $element, ""); // Take changes from session and store in changes table
        \Session::push('event', 'saved');
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
