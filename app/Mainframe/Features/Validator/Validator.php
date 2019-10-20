<?php

namespace App\Mainframe\Features\Validator;

use App\Mainframe\Modules\Modules\Module;

class Validator
{
    public $element;
    public $element_original;
    public $valid = true;

    /**
     * Validator constructor.
     *
     * @param  \App\Mainframe\BaseModule  $element
     */
    public function __construct($element)
    {
        $this->element          = $element;
        $this->element_original = $element->getOriginal();
    }

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     * Example: 'name' => ['required', 'Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/']
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name'      => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'title'     => 'required|between:1,255|unique:modules,title,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Run all rule checkers
     * @return \App\Mainframe\BaseModule|bool
     */
    public function run()
    {
        $this->nameShouldNotHaveSpecialCharacters();
        return $this->result();

    }

    /**
     * Get results
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