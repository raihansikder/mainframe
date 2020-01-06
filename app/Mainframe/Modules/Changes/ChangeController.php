<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ChangeController extends ModularController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('changes');
    }

    /**
     * @return ChangeDatatable
     */
    public function datatable()
    {
        return new ChangeDatatable($this->module);
    }
}
