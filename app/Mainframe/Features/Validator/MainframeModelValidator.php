<?php /** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Validator;

use Request;
use Validator;

class MainframeModelValidator
{
    protected $element;
    protected $element_original;
    protected $valid             = true;
    protected $validator;
    protected $validation_errors = [];
    protected $errors            = [];
    protected $message           = '';

    /**
     * MainframeModelValidator constructor.
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

    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
    }

    public function validateRules()
    {
        $this->validator = Validator::make(
            $this->requests(),
            self::rules($this->element),
            self::customErrorMessages()
        );

        if ($this->validator->fails()) {
            $this->valid = false;
        }

        $this->validation_errors = json_decode($this->validator->messages(), true);

        return $this->validator;

    }

    public function requests()
    {
        return Request::all();
    }


    public function saving()
    {
        $this->validateRules();
    }

    public function creating()
    {
        $this->saving();
    }

    public function updating()
    {
        $this->saving();
    }

    public function deleting()
    {

    }

    public function restoring()
    {
        $this->saving();
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
    // public function nameShouldNotHaveSpecialCharacters()
    // {
    //     if (! strlen($this->element->name)) {
    //         $this->valid = setError('Something');
    //     }
    // }
}