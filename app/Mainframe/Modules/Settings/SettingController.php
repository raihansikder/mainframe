<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SettingController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'settings';

    /**
     * @return SettingDatatable
     */
    public function datatable()
    {
        return new SettingDatatable($this->module);
    }

    /**
     * API to get the setting
     *
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($name)
    {

        /** @var \App\Mainframe\Modules\Settings\Setting $setting */
        $setting = Setting::where('name', $name)->remember(timer('short'))->first();
        if ($setting) {
            return $this->response()->success()->load($setting->getValue())->json();
        }

        return $this->response()->fail()->json();
    }
}
