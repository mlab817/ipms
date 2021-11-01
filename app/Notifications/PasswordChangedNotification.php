<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChangedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

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
                    ->subject('[' . config('app.name') . '] Your password has been changed')
                    ->greeting('Hi, @' . $notifiable->username . '!')
                    ->line('You\'ve successfully changed your '. config('app.name') .' password!')
                    ->line('If you didn\'t authorize this, please call us immediately at (02)8920-9116 or email us at ipd@da.gov.ph. You may always just reset your password by clicking "I forgot my password" in the login screen')
                    ->line('Thank you for using our application!');
    }
}
