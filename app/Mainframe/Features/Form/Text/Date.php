<?php

namespace App\Mainframe\Features\Form\Text;

use Carbon\Carbon;

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

    }

    /**
     * Get the formatted date to show in the frontend.
     *
     * @return string|null
     */
    public function formatted()
    {

        $date = $this->value();

        if (! $date) {
            return null;
        }

        if ($date instanceof Carbon) {
            return $date->format($this->format);
        }

        return Carbon::createFromDate($date)->format($this->format);

    }

    /**
     * @return array|\Illuminate\Http\Request|string|null
     */
    public function print()
    {
        return $this->formatted();
    }
}