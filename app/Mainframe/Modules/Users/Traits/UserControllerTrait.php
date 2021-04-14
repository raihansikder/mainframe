<?php

namespace App\Mainframe\Modules\Users\Traits;

use App\User;
use Hash;
use Validator;

trait UserControllerTrait
{
    /**
     * Prepare the model, First transform the input and then fill
     *
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function fill()
    {
        $inputs = request()->except('password');

        // Hash password
        if (request('password')) {
            $inputs['password'] = Hash::make(request('password'));
        }

        return $this->element->fill($inputs);
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function storeRequestValidator()
    {
        $rules = [
            'password' => User::PASSWORD_VALIDATION_RULE,
        ];
        $message = [
            'password.regex' => 'The password field should be mix of letters and numbers.',
        ];

        $this->validator = Validator::make(request()->all(), $rules, $message);

        return $this->validator;
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateRequestValidator()
    {
        if (request('password')) {
            return $this->storeRequestValidator();
        }

        return $this->validator();
    }
}