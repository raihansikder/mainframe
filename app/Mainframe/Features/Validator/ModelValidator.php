<?php /** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Validator;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class ModelValidator
{
    /** @var \App\Mainframe\BaseModule */
    public $element;
    /** @var array|mixed */
    public $elementOriginal;
    /** @var bool */
    public $valid;
    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /** @var MessageBag */
    public $messageBag;

    /**
     * MainframeModelValidator constructor.
     *
     * @param  \App\Mainframe\BaseModule  $element
     * @param  \Illuminate\Support\MessageBag  $messageBag
     */
    public function __construct($element, MessageBag $messageBag = null)
    {
        $this->valid = true;
        $this->element = $element;
        $this->elementOriginal = $element->getOriginal();
        if (! $messageBag) {
            $this->messageBag = new MessageBag();
        }
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
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * @param  array  $merge
     * @return array
     */
    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
    }

    public function validateRules()
    {
        $validator = Validator::make(
            $this->element->getAttributes(),
            self::rules($this->element),
            self::customErrorMessages()
        );

        if ($validator->fails()) {
            $this->valid = false;
        }

        $this->validator = $validator;

        return $this->validator;

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

    public function fails()
    {
        return $this->valid ? false : true;
    }

    public function passes()
    {
        return ! $this->fails();
    }

    public function fill($element)
    {
        return $this;
    }

    public function validate()
    {
        $this->fill($this->element);
        $this->validateRules();

        return $this;
    }

    public function saving()
    {
        $this->fill($this->element);
        $this->validateRules();

        return $this;
    }

    public function creating()
    {
        $this->saving();

        return $this;
    }

    public function updating()
    {
        $this->fill($this->element);
        $this->saving();

        return $this;
    }

    public function deleting()
    {
        return $this;

    }

    public function restoring()
    {
        $this->saving();

        return $this;
    }

}