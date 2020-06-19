<?php /** @noinspection PhpUnused */

namespace App\Mainframe\Features\Core\Traits;

use Illuminate\Support\MessageBag;
use Validator;

/**
 * Trait Validable
 *
 * @package App\Mainframe\Features\Modular\BaseController\Traits
 */

/** @mixin  \App\Mainframe\Http\Controllers\BaseController $this */
trait Validable
{
    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /**
     * Setter function for $validator
     *
     * @param $validator
     * @return $this
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validator()
    {

        if ($this->validator) {
            return $this->validator;
        }

        $this->validator = Validator::make([], []);

        return $this->validator;
    }

    /**
     * Add an error message to a key-value pair
     *
     * @param null $message
     * @param null $key
     * @return \App\Mainframe\Features\Core\Traits\Validable
     */
    public function error($message, $key = null)
    {
        $key = $key ?: 'error';
        $this->fieldError($key, $message);

        // Also add the message in message bag
        resolve(MessageBag::class)->add('errors', $message);

        return $this;
    }

    /**
     * Add a field specific error message
     *
     * @param null $key
     * @param null $message
     * @return $this
     */
    public function fieldError($key, $message = null)
    {
        $message = $message ?: $key.' is not valid';
        $this->validator()->errors()->add($key, $message);

        return $this;
    }

    /**
     * Check if the validator has any error
     *
     * @return bool
     */
    public function isInvalid()
    {
        return $this->validator()->messages()->count();
        // return $this->valid ? false : true;
    }

    /**
     * Check if passed
     *
     * @return bool
     */
    public function isValid()
    {
        return ! $this->isInvalid();
    }

}