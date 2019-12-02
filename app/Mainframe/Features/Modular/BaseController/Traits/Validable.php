<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use Validator;

/**
 * Trait Validable
 *
 * @package App\Mainframe\Features\Modular\BaseController\Traits
 */

/** @mixin  \App\Mainframe\Features\Modular\BaseController\BaseController $this */
trait Validable
{
    /** @var \Illuminate\Validation\Validator */
    public $validator;

    public function validator()
    {
        if ($this->validator) {
            return $this->validator;
        }

        return Validator::make([], []);
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
            $this->validator()->errors()->add($key, $message);
        }
    }

    /**
     * Check if failed
     *
     * @return bool
     */
    public function failed()
    {
        return $this->validator()->messages()->count();
        // return $this->valid ? false : true;
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

}