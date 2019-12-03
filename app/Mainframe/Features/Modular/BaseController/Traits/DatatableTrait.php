<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use App\Mainframe\Features\Datatable\Datatable;
use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

/**
 * Trait GridDatatable
 *
 * @package App\Traits
 */

/** @mixin ModuleBaseController  $this  */
trait DatatableTrait
{

    /**
     * Resolve which MainframeDatatable class to use.
     *
     * @return \App\Mainframe\Features\Datatable\Datatable
     */
    public function datatable()
    {
        return new ModuleDatatable($this->module);
    }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    public function datatableJson()
    {

        return ($this->datatable())->json();
    }

}