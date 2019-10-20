<?php

namespace App\Observers;

use App\Mainframe\Observers\BaseModuleObserver;

class SettingObserver extends BaseModuleObserver
{
    /**
     * @param $element \App\Mainframe\Basemodule
     */
    public function saving($element)
    {

        setMessage('Work too!');
        parent::saving($element);

    }
}
