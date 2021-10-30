<?php

namespace App\Notifications;

use App\Models\User;

class NotificationTemplate
{
    public User $sender;

    public string $content;

    public string $redirectUrl;

    public function __construct(
        $sender,
        $content,
        $redirectUrl
    )
    {
        $this->sender = $sender;
        $this->content = $content;
        $this->redirectUrl = $redirectUrl;
    }
}