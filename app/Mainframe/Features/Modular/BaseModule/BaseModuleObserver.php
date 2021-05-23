<?php

namespace App\Mainframe\Features\Modular\BaseModule;

class BaseModuleObserver
{
    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    public function saving($element)
    {
        $element->autoFill();
    }

    /**
     * @param    $element
     * @return void|bool
     */
    // public function creating($element) { }

    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    // public function created($element) { }

    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    public function updating($element)
    {
        // if (!$element->isEditable()) {  // Note: Conflict with business logic
        //     error('Element is not editable');
        //     return false;
        // }
    }

    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    // public function updated($element) { }

    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    public function saved($element)
    {
        $element->linkUploads();
        $element->trackFieldChanges();
        $element->syncSpreadKeys();
        $element->syncSpreadTags();
    }

    /**
     * @param  BaseModule  $element
     * @return void|bool
     */
    public function deleting($element)
    {
        if (!$element->isDeletable()) {
            error('Element is not deletable');

            return false;
        }
    }

    /**
     * Handle the base module "deleted" event.
     *
     * @param  BaseModule  $element
     * @return void
     */
    // public function deleted($element)
    // {
    //     $element->markDeleted();
    // }

    /**
     * Handle the base module "restored" event.
     *
     * @param  $element
     * @return void
     */
    // public function restored($element) { }

    /**
     * Handle the base module "force deleted" event.
     *
     * @param  $element
     * @return void
     */
    // public function forceDeleted($element) { }
}
