<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectDroppedNotification extends Notification
{
    use Queueable;

    public $project;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $userId)
    {
        $this->project  = $project;
        $this->user     = User::find($userId);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return (array) (new NotificationTemplate(
            $this->user,
            $this->user->full_name . ' dropped a PAP. View now.',
            route('projects.show', $this->project)
        ));
    }
}
