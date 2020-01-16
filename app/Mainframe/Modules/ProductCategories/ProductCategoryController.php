<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductCategories;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ProductCategoryController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'product-categories';

    /**
     * @return ProductCategoryDatatable
     */
    public function datatable()
    {
        return new ProductCategoryDatatable($this->module);
    }
}
