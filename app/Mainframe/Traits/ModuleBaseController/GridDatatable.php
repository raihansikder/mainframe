<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Traits\ModuleBaseController;

use App\Mainframe\Features\Datatable\Datatable;
use App\Http\Mainframe\Controllers\ModuleBaseController;

/**
 * Trait GridDatatable
 *
 * @var $this ModuleBaseController
 * @package App\Traits
 */
trait GridDatatable
{

    /**
     * Resolve which Datatable class to use.
     *
     * @param  null  $class
     * @return \App\Mainframe\Features\Datatable\Datatable
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
        return $this->datatable->json();
    }

}