<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use App\Mainframe\Helpers\Datatable\Datatable;
use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

/**
 * Trait GridDatatable
 *
 * @var $this ModuleBaseController
 * @package App\Traits
 */
trait DatatableTrait
{

    /**
     * Resolve which MainframeDatatable class to use.
     *
     * @param  null  $class
     * @return \App\Mainframe\Helpers\Datatable\Datatable
     */
    public function resolveDatatableClass($class = null)
    {
        /** @var ModuleBaseController $this */
        return $class ?? new Datatable($this->moduleName);
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
        /** @var ModuleBaseController $this */

        return ($this->resolveDatatableClass())->json();
    }

}