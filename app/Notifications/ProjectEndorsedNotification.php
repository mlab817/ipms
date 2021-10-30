<?php

namespace App\Notifications;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectEndorsedNotification extends Notification
{
    use Queueable;

    public int $projectId;

    public $project;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($projectId, $userId)
    {
        $this->projectId = $projectId;

        $this->project = Project::find($projectId);

        $this->user = User::find($userId);
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
            $this->user->full_name . ' endorsed a PAP. View now.',
            route('projects.show', $this->project)
        ));
    }
}
