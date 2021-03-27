<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Comments\Traits\CommentControllerTrait;

/**
 * @group  Comments
 *
 * APIs for managing comments
 */
class CommentController extends ModularController
{

    use CommentControllerTrait;
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
