<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Features\Core\Traits;

use Validator;

/**
 * Trait Validable
 *
 * @package App\Mainframe\Features\Modular\BaseController\Traits
 */

/** @mixin  \App\Mainframe\Http\Controller\BaseController $this */
trait Validable
{
    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /**
     * @param  null|\Illuminate\Validation\Validator  $validator
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validator($validator = null)
    {
        if ($validator) {
            $this->validator = $validator;
        }
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
     * @return \App\Mainframe\Features\Core\Traits\Validable
     */
    public function addError($message)
    {
        $this->validator()->errors()->add('error', $message);

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
     * Check if the validator has any error
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