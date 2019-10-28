<?php

namespace App\Mainframe\Modules\Superheros;

use App\Mainframe\Helpers\Modular\Validator\ModelValidator;

class SuperheroValidator extends ModelValidator
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
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? (string) $element->id : 'null').',id,deleted_at,NULL',
            'title' => 'required|between:1,255',
            'type' => 'required|'.'in:'.implode(',', array_keys(Setting::$types)),
            'desc' => 'between:1,2048',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    public function saving()
    {
        parent::saving();
        $this->validateSomething();

        return $this;
    }

    private function validateSomething()
    {
        $superhero = $this->element;

        if ($superhero->name === 'Joker') {
            $this->invalidate('name', "Name can not be Joker");
        }
    }
}