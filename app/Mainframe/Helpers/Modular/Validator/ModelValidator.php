<?php /** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Helpers\Modular\Validator;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class ModelValidator
{
    /** @var bool */
    private $valid;

    /** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule */
    public $element;

    /** @var array|mixed */
    public $elementOriginal;

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /** @var MessageBag */
    public $messageBag;

    /**
     * MainframeModelValidator constructor.
     *
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     */
    public function __construct($element)
    {
        $this->messageBag = resolve(MessageBag::class);
        $this->valid = true;
        $this->element = $element;
        $this->elementOriginal = $element->getOriginal();
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
            'name' => 'required|between:1,255|unique:modules,name,'
                .(isset($element->id) ? (string) $element->id : 'null')
                .',id,deleted_at,NULL',
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

    /**
     * Run a validation only on the defined rules.
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validateRules()
    {
        $validator = Validator::make(
            $this->element->getAttributes(),
            $this::rules($this->element),
            $this::customErrorMessages()
        );

        $this->validator = $validator;

        if ($validator->fails()) {
            $this->invalidate();
        }

        return $this->validator;
    }

    /**
     * Get results
     *
     * @return \App\Mainframe\Helpers\Modular\BaseModule\BaseModule|bool
     */
    public function result()
    {
        return $this->passes() ? $this->element : false;
    }

    /**
     * Check if valid flag is set to false
     *
     * @return bool
     */
    public function fails()
    {
        return $this->valid ? false : true;
    }

    /**
     * Check if the valid flag is set to true
     *
     * @return bool
     */
    public function passes()
    {
        return ! $this->fails();
    }

    /**
     * Invalidate with a key and error message
     *
     * @param  null  $key
     * @param  null  $message
     * @return $this
     */
    public function invalidate($key = null, $message = null)
    {
        $this->addError($key, $message);
        $this->valid = false;

        return $this;
    }

    /**
     * Add an error message to a key-value pair
     *
     * @param  null  $key
     * @param  null  $message
     */
    public function addError($key = null, $message = null)
    {
        $this->validator->messages()->add($key, $message);
    }

    /**
     * Fill the model with values
     *
     * @return $this
     */
    public function fill()
    {
        // $element->some_val = $new_val
        return $this;
    }

    /**
     * Based on existence of id field decide to check creating()/updating()
     *
     * @return $this
     */
    public function validate()
    {
        if (isset($this->element->id)) {
            return $this->updating();
        }

        return $this->saving();
    }

    /**
     * Run validations for saving. This should be common for both creating and updating.
     *
     * @return $this
     */
    public function saving()
    {
        $this->fill()->validateRules();

        return $this;
    }

    /**
     * Run validations for creating. This should always call the saving().
     *
     * @return $this]
     */
    public function creating()
    {
        $this->saving();

        return $this;
    }

    /**
     * Run validations for updating. This should always call the saving().
     *
     * @return $this
     */
    public function updating()
    {
        $this->fill()->saving();

        return $this;
    }

    /**
     * Run validations for deleting.
     *
     * @return $this
     */
    public function deleting()
    {
        return $this;
    }

    /**
     * Run validations for restoring.
     *
     * @return $this
     */
    public function restoring()
    {
        $this->saving();

        return $this;
    }

}