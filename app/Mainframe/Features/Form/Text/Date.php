<?php

namespace App\Mainframe\Features\Form\Text;

class Date extends InputText
{

    public $format = 'd-m-Y';

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        // $this->params['class'] .= ' datepicker ';

    }

    /**
     * Get the formatted date to show in the frontend.
     *
     * @return string|null
     */
    public function formatted()
    {

        if ($this->value()) {
            return \Carbon\Carbon::createFromDate($this->value())
                ->format($this->format);
        }

        return null;
    }
}