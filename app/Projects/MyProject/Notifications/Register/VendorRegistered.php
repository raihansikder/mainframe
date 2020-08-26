<?php /** @noinspection PhpUnusedParameterInspection */

namespace App\Projects\MyProject\Notifications\Register;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VendorRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Registered user
     *
     * @var \App\User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view('projects.my-project.emails.register.vendor-registered', ['user' => $this->user])
            ->subject(__(' MPH | A new Vendor Request'))
            ->cc(config('projects.my-project.config.default_email_recipients'));
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
