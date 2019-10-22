<?php

namespace App\Mainframe\Modules\Settings\Validation;

use App\Mainframe\Features\Validator\ModelValidator;

class SettingValidator extends ModelValidator
{


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
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
        ];

        return array_merge($rules, $merge);
    }





    /**
     * Rule : Name should not have some character.
     */
    public function nameShouldNotHaveSpecialCharacters()
    {
        if (! strlen($this->element->name)) {
            $this->valid = setError('Something');
        }

        return $this;
    }
}