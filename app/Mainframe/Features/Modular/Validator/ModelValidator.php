<?php
/** @noinspection PhpUnusedParameterInspection */

/** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Modular\Validator;

use Validator;
use Illuminate\Support\MessageBag;

class ModelValidator
{

    /** @var bool */
    public $valid;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
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
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     */
    public function __construct($element)
    {
        $this->messageBag = resolve(MessageBag::class);
        $this->valid = true;
        $this->element = $element;
        $this->elementOriginal = $element->getOriginal();
    }

    /**
     * Fill the model with values
     *
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     * @return $this
     */
    public function fill($element)
    {
        return $this;
    }

    /**
     * Validation rules.
     *
     * @param  mixed  $element
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
     * Custom error messages.
     *
     * @param  array  $merge
     * @return array
     */
    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
    }

    /**
     * Validate based on rules
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validateRules()
    {
        $this->validator = Validator::make(
            $this->element->getAttributes(),
            $this::rules($this->element),
            $this::customErrorMessages()
        );

        return $this->validator;
    }

    /**
     * Get result
     *
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|bool
     */
    public function result()
    {
        return $this->passed() ? $this->element : false;
    }

    /**
     * Check if failed
     *
     * @return bool
     */
    public function failed()
    {
        return $this->valid ? false : true;
    }

    /**
     * Check if passed
     *
     * @return bool
     */
    public function passed()
    {
        return ! $this->failed();
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
     * Ad
     * d an error message to a key-value pair
     *
     * @param  null  $key
     * @param  null  $message
     */
    public function addError($key = null, $message = null)
    {
        if ($message) {
            $this->validator->messages()->add($key, $message);
        }
    }

    /**
     * Run validation logic on model.
     * Based on existence of id field decide to check creating()/updating()
     *
     * @return $this
     */
    public function validate()
    {
        if (isset($this->element->id)) {
            return $this->update();
        }

        return $this->create();
    }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | Model events where validation is checked.
    */

    /**
     * Run validation for save.
     *
     * @param  null  $element
     * @return $this
     */
    public function save($element = null)
    {
        $element = $element ?: $this->element;
        $this->fill($element)->validateRules();
        $this->saving($element);

        return $this;
    }

    /**
     * Run validation for create.
     *
     * @param  null  $element
     * @return $this
     */
    public function create($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->creating($element);

        return $this;
    }

    /**
     * Run validation for update.
     *
     * @param  null  $element
     * @return $this
     */
    public function update($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->updating($element);

        return $this;
    }

    /**
     * Run validation for delete.
     *
     * @param  null  $element
     * @return $this
     */
    public function delete($element = null)
    {
        $element = $element ?: $this->element;
        $this->deleting($element);

        return $this;
    }

    /**
     * Run validation for restore.
     *
     * @param  null  $element
     * @return $this
     */
    public function restore($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->restoring($element);

        return $this;
    }

    
    /*
    |--------------------------------------------------------------------------
    | Event specific validation
    |--------------------------------------------------------------------------
    |
    | Following functions are overridden in model validators to write
    | event specific validation logic.
    */

    /**
     * Saving validation.
     * Common for both create and update.
     *
     * @param $element
     * @return $this
     */
    public function saving($element)
    {
        return $this;
    }

    /**
     * Creating validation
     *
     * @param $element
     * @return $this]
     */
    public function creating($element)
    {
        return $this;
    }

    /**
     * Updating validation
     *
     * @param $element
     * @return $this]
     */
    public function updating($element)
    {
        return $this;
    }

    /**
     * Deleting validation
     *
     * @param $element
     * @return $this]
     */
    public function deleting($element)
    {
        return $this;
    }

    /**
     * Restoring validation
     *
     * @param $element
     * @return $this]
     */
    public function restoring($element)
    {
        return $this;
    }

}