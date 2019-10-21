<?php

namespace App\Mainframe\Modules\Modules\Validators;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Validator\MainframeModelValidator;

class ModuleValidator extends MainframeModelValidator
{
    public $element;
    public $element_original;
    public $valid = true;


    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name'      => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Run all rule checkers
     *
     * @return \App\Mainframe\BaseModule|bool
     */
    public function run()
    {
        $this->nameShouldNotHaveSpecialCharacters();

        return $this->result();

    }


    /**
     * Get results
     *
     * @return \App\Mainframe\BaseModule|bool
     */
    public function result()
    {
        return $this->valid ? $this->element : false;
    }

    /**
     * Rule : Name should not have some character.
     */
    public function nameShouldNotHaveSpecialCharacters()
    {
        if (! strlen($this->element->name)) {
            $this->valid = setError('Something');
        }
    }
}