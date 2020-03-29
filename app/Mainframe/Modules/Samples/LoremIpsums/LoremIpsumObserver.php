<?php

namespace App\Mainframe\Modules\Samples\LoremIpsums;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Uploads\Upload;

class LoremIpsumObserver extends BaseModuleObserver
{
    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function saving($element)
    {
        $element->autoFill();
        // echo 'In Model Observer:saving() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\
     * @return void|bool
     */
    public function creating($element)
    {
        // echo 'In Model Observer:creating() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function created($element)
    {
        // echo 'In Model Observer:created() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function updating($element)
    {
        // echo 'In Model Observer:updating() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function updated($element)
    {
        // echo 'In Model Observer:updated() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function saved($element)
    {
        Upload::linkTemporaryUploads($element);
        // echo 'In Model Observer:saved() ';
    }

    /**
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void|bool
     */
    public function deleting($element)
    {
        // echo 'In Model Observer:deleting() ';
    }

    /**
     * Handle the base module "deleted" event.
     *
     * @param  $element \App\Mainframe\Features\Modular\BaseModule\BaseModule
     * @return void
     */
    public function deleted($element)
    {
        // echo 'In Model Observer:deleted() ';
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