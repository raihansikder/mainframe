<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductCategories;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ProductCategoryController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('product-categories');
    }

    /**
     * @return ProductCategoryDatatable
     */
    public function datatable()
    {
        return new ProductCategoryDatatable($this->module);
    }
}
