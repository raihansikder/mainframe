<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductThemes;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ProductThemeController extends ModularController
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
