<?php /** @noinspection PhpUnused */

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

        $this->validator = Validator::make([], []);

        return $this->validator;
    }

    /**
     * Ad
     * d an error message to a key-value pair
     *
     * @param  null  $message
     * @return \App\Mainframe\Features\Modular\BaseController\Traits\Validable
     */
    public function addError($message = null)
    {
        if ($message) {
            $this->validator()->errors()->add('error', $message);
        }

        return $this;
    }

    /**
     * @param  null  $key
     * @param  null  $message
     * @return $this
     */
    public function addFieldError($key, $message = null)
    {
        $message = $message ?: $key.' - is not valid';
        $this->validator()->errors()->add($key, $message);

        return $this;
    }

    /**
     * Check if failed
     *
     * @return bool
     */
    public function invalid()
    {
        return $this->validator()->messages()->count();
        // return $this->valid ? false : true;
    }

    /**
     * Check if passed
     *
     * @return bool
     */
    public function valid()
    {
        return ! $this->invalid();
    }

}