<?php

namespace App\Mainframe\Features\Modular\BaseModule;

class BaseModuleObserver
{
    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    public function saving($element)
    {
        $element->autoFill();
    }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\  $element
     * @return void|bool
     */
    // public function creating($element) { }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    // public function created($element) { }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    // public function updating($element) { }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    // public function updated($element) { }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    public function saved($element)
    {
        $element->linkUploads();
        $element->trackFieldChanges();
    }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return void|bool
     */
    // public function deleting($element) { }

    /**
     * Handle the base module "deleted" event.
     *
     * @param  $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
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
