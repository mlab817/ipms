<?php

namespace App\Notifications;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectTransferredNotification extends Notification
{
    use Queueable;

    public $user;

    public $project;

    public $newOwner;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($projectId, $userId, $newOwnerId)
    {
        $this->project  = Project::find($projectId);
        $this->user     = User::find($userId);
        $this->newOwner = User::find($newOwnerId);
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
        return (array) new NotificationTemplate(
            $this->user,
            $this->user->full_name . ' transferred ownership of the "'. $this->project->title .'" to ' . $this->newOwner->full_name . '.',
            route('projects.show', $this->project)
        );
    }
}
