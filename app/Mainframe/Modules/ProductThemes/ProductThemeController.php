<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductThemes;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ProductThemeController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('product-themes');
    }

    /**
     * @return ProductThemeDatatable
     */
    public function datatable()
    {
        return new ProductThemeDatatable($this->module);
    }
}
