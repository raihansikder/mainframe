<?php

namespace App\Observers;

use App\Mainframe\Observers\BaseModuleObserver;

class ChangeObserver extends BaseModuleObserver
{
    public function created($element)
    {
    }

    /**
     * This function is executed during a model's saving() phase
     *
     * @param $element \App\Mainframe\Basemodule
     * @return bool
     */
    public function saving($element)
    {
        $element = fillModel($element); // This line should be placed just before return
    }

    /**
     * This function is executed during a model's saved() phase
     *
     * @param $element \App\Mainframe\Basemodule
     * @return bool|void
     */

    public function saved($element)
    {
    }

    /**
     * @param $element
     * @return bool|void
     */
    public function deleting($element)
    {
    }
}
