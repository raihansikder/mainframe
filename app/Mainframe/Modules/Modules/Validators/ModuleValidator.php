<?php

namespace App\Mainframe\Modules\Modules\Validators;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Validator\Validator as MainframeModelValidator;

class ModuleValidator extends MainframeModelValidator
{
    public $element;
    public $module_original;
    public $valid = true;

    public function __construct(Module $module)
    {
        $this->element         = $module;
        $this->module_original = $module->getOriginal();
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

    public function run()
    {
        $this->nameShouldNotHaveSpecialCharacters();

        return $this->result();

    }

    public function result()
    {
        return $this->valid ? $this->element : false;
    }

    public function nameShouldNotHaveSpecialCharacters()
    {
        if (! strlen($this->element->name)) {
            $this->valid = setError('Something');
        }
    }
}