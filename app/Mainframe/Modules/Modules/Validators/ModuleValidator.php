<?php

namespace App\Mainframe\Modules\Modules\Validators;

use App\Mainframe\Modules\Modules\Module;

class ModuleValidator
{
    public $module;

    public function __construct(Module $module)
    {
        $this->module = $module;

    }

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     * Example: 'name' => ['required', 'Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/']
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules(Module $element, $merge = [])
    {
        $rules = [
            'name'      => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'title'     => 'required|between:1,255|unique:modules,title,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
        ];

        return array_merge($rules, $merge);
    }
}