<?php

namespace App\Projects\MyProject\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends \Illuminate\Auth\Notifications\ResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        /*---------------------------------
        | Example : Using Dynamic content
        |---------------------------------*/

        // return (new MailMessage)->view('mainframe.emails.blank',
        //     ['content' => (new SampleContent())->get()]
        // )->subject(__('Reset Password Notification'));

        return (new MailMessage)->view('projects.my-project.emails.auth.reset-password', [
                'url' => url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)),
            ]
        )->subject(__('Reset Password Notification'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
