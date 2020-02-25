<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class CommentController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'comments';

    /**
     * @return CommentDatatable
     */
    public function datatable()
    {
        return new CommentDatatable($this->module);
    }
}
