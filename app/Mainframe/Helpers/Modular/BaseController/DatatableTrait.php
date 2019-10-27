<?php /** @noinspection PhpUnused */

namespace App\Http\Mainframe\Helpers\Modular\BaseController;

use App\Mainframe\Features\Datatable\MainframeDatatable;
use App\Http\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

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
     * @return \App\Mainframe\Features\Datatable\MainframeDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        /** @var ModuleBaseController $this */
        return $class ?? new MainframeDatatable($this->moduleName);
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