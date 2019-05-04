<?php

namespace App\Events\Parish;

use App\Parish;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ParishSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $parish;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Parish $parish)
    {
        $this->parish = $parish;
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
