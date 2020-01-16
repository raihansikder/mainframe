<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ProductThemes;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ProductThemeController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'product-themes';

    /**
     * @return ProductThemeDatatable
     */
    public function datatable()
    {
        return new ProductThemeDatatable($this->module);
    }
}
