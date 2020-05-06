<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Users;

use Hash;
use Validator;
use App\Mainframe\Features\Modular\ModularController\ModularController;

class UserController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'users';

    /**
     * @return UserDatatable
     */
    public function datatable()
    {
        return new UserDatatable($this->module);
    }

    /**
     * Prepare the model, First transform the input and then fill
     *
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function fill()
    {
        $inputs = request()->except('password');

        if (request('password')) {
            $inputs['password'] = Hash::make(request('password'));
        }

        return $this->element->fill($inputs);
    }

    /**
     * @return \Illuminate\Validation\Validator
     */
    public function storeRequestValidator()
    {
        $rules = ['password' => User::PASSWORD_VALIDATION_RULE,];
        $message = ['password.regex' => 'The password field should be mix of letters and numbers.',];

        $this->validator = Validator::make(request()->all(), $rules, $message);

        return $this->validator;
    }

    /**
     * @return \Illuminate\Validation\Validator
     */
    public function updateRequestValidator()
    {
        if (request('password')) {
            return $this->storeRequestValidator();
        }

        return $this->validator();
    }

}
