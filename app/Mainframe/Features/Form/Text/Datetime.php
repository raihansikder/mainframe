<?php

namespace App\Mainframe\Features\Form\Text;

class Datetime extends InputText
{

    public $format = 'd-m-Y H:i:s';

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

    }

    /**
     * Get the formatted date to show in the frontend.
     *
     * @return string|null
     */
    public function formatted()
    {

        if ($this->value()) {
            return \Carbon\Carbon::createFromTimeString($this->value())
                ->format($this->format);
        }

        return null;
    }
}