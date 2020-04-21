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
        $element->autoFill();
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\
     * @return void|bool
     */
    public function creating($element) { }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function created($element) { }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function updating($element) { }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function updated($element) { }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function saved($element)
    {
        Upload::linkTemporaryUploads($element);
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function deleting($element) { }

    /**
     * Handle the base module "deleted" event.
     *
     * @param  $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void
     */
    public function deleted($element)
    {
    }

    /**
     * Handle the base module "restored" event.
     *
     * @param  $element
     * @return void
     */
    public function restored($element)
    {
    }

    /**
     * Handle the base module "force deleted" event.
     *
     * @param  $element
     * @return void
     */
    public function forceDeleted($element)
    {
    }
}
