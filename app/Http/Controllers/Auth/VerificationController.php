<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Mail\UserPostVerificationEmail;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Mark the authenticated user's email address as verified.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {

        // This is required if verification is done after sign in
        // Also needs to un-comment the 'auth' controller in constructor.

        // if ($request->route('id') != $request->user()->getKey()) {
        //     throw new AuthorizationException;
        // }

        // if ($request->user()->markEmailAsVerified()) {
        //     event(new Verified($request->user()));
        // }

        //return redirect($this->redirectPath())->with('verified', true);

        /****
         * Since we are verifying directly from the url without login we need to
         * resolve the user manually.
         */

        $user            = User::find($request->route('id'));
        $user->is_active = 1;
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        Mail::to($user)->send(new UserPostVerificationEmail($user));
        return view('auth.verified-letsbab');
    }

    /**
     * Show the form for sending bulk verification resend email
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bulkResend()
    {
        if (!user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }
        $users = $this->unverifiedUsers();
        return view('custom.bulk-resend')->with(compact('users'));
    }

    /**
     * Post Bulk email resend
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postBulkResend()
    {
        if (!user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }

        if (\Request::get('user_ids')) {
            $users = User::whereIn('id', \Request::get('user_ids'))->get();
        } else {
            $users = $this->unverifiedUsers();
        }

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new Registered($user));
        }
        setSuccess('Verification email sent');
        return redirect(route('bulk-resend'));
    }

    /**
     * Get a list of un-verified users
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function unverifiedUsers()
    {
        return User::where('group_ids_csv', '8')
            ->whereNull('email_verified_at')
            ->whereNull('deleted_at')->get();
    }
}
