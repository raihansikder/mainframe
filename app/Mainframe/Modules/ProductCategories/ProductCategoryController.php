<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductCategories;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ProductCategoryController extends ModularController
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
