<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

use Illuminate\Support\Str;
use App\Mainframe\Modules\Modules\Module;

/** @mixin $this BaseModule */
trait ModularTrait
{
    /**
     * Get the module object that an element belongs to. If the element is $tenant then the function
     * returns the row from modules table that has module name 'tenants'.
     *
     * @return Module
     */
    public function module()
    {
        $moduleName = Str::kebab(Str::camel($this->getTable()));

        return Module::where('name', $moduleName)
            ->remember(cacheTime('very-long'))->first();
    }
}