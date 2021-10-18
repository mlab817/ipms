<?php

namespace App\Notifications;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectDeletedNotification extends Notification
{
    use Queueable;

    public $project;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, User $user)
    {
        $this->project  = $project;
        $this->user     = $user;
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
        return [
            'sender'    => $this->user,
            'subject'   => 'Project Deleted',
            'message'   => $this->user->name . ' deleted your project: ' . $this->project['title'],
            'actionUrl' => '#',
        ];
    }
}
