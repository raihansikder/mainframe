<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Traits\ModuleBaseController;

use App\Mainframe\Features\Datatable\MainframeDatatable;
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
        return $this->datatable->json();
    }

}