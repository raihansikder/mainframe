<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mainframe\Modules\Users\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mainframe\Features\Modular\BaseController\BaseController;

class RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $user = new User($request->all());
        // Custom validation error message for specific fields.
        $customValidationMessages = [
            'password.regex' => "The password field should be mix of letters and numbers.",
        ];

        $validator = Validator::make($request->all(), array_merge(User::rules($user), [
            'password' => 'required|confirmed|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'required | same:password',
            'group_id' => 'required',
        ]), $customValidationMessages);

        if ($validator->fails()) {
            $ret = ret('fail', "Validation error(s)", ['validation_errors' => json_decode($validator->messages(), true)]);
        } else {

            /** Fill the json */
            $user->group_ids = json_encode([$request->get('group_id')]);
            $user->password = Hash::make($request->get('password'));

            if ($user->save()) {
                event(new Registered($user));
                //$user->sendRegistrationWithVerificationNotification();
                //Mail::to($user)->send(new \App\Mail\Registered($user));
                //$user->sendEmailVerificationNotification();
                $ret = ret('success',
                    "Lets make sure it's you!<br>A confirmation email has been sent to ".$user->email.". Click on the confirmation link in the email to activate your account.",
                    ['data' => User::find($user->id)]);
            } else {
                $ret = ret('fail', "User could not be created");
            }
        }

        /**
         * Determine where to redirect after registration.
         */
        $redirect_to = route('login');
        if ($request->has('redirect_success')) {
            $redirect_to = $request->get('redirect_success');
        } else {
            if ($user->isRecommender()) {
                $redirect_to = route('shop.login');
            }
        }

        $request->merge(['redirect_success' => $redirect_to]);

        return $this->jsonOrRedirect($ret, $validator, $user);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Mainframe\Modules\Users\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
