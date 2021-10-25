<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserDeactivatedNotification extends Notification
{
    use Queueable;

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
                    ->subject('Account Deactivated')
                    ->greeting('Dear ' . $notifiable->first_name)
                    ->line('Your account has been deactivated. No further action is required. You may request for the IPD to restore your account.')
                    ->line('If you think this is a mistake, please notify IPD at ' . config('ipms.email') . ' and/or ' . config('ipms.contact_info') . '.')
                    ->line('Thank you for using our application!');
    }
}
