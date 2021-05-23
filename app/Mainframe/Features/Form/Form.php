<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

class Form
{
    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    public $element;

    /** @var string */
    public $uid;

    /** @var array */
    public $var;

    /** @var \Illuminate\Support\MessageBag */
    public $errors;

    /** @var array */
    public $immutables;

    public function __construct($var = [], $element = null)
    {
        $this->var = $var;

        $this->element = $element ?? ($this->var['element'] ?? null);
        $this->errors = $this->var['errors'] ?? new ViewErrorBag();
        $this->immutables = $this->var['immutables'] ?? [];
        $this->uid = Str::random(8);
    }

    /**
     * Set up the values of the var array that is used to generate the form input
     *
     * @param $var
     * @param null $errors
     * @param null $element
     * @param null $editable
     * @param null $immutables
     * @return mixed
     */
    public static function setUpVar($var, $errors = null, $element = null, $editable = null, $immutables = null)
    {
        if (! isset($var['editable']) && isset($editable)) {
            $var['editable'] = $editable;

            // Check immutability
            if ($editable && isset($immutables,$var['name']) ) {
                $var['editable'] = ! in_array($var['name'], $immutables);
            }
        }

        // Get the module element
        if (! array_key_exists('element', $var)) {
            $var['element'] = $element ?? null;
        }

        // Get a list of immutables
        $var['immutables'] = $immutables ?? [];

        // Set errors from ErrorBag
        $var['errors'] = $errors ?? [];

        return $var;

    }

}