<?php

namespace App\Events;

use App\Models\Role;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RoleChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $array;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
