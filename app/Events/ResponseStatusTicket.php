<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResponseStatusTicket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $answerStatusTicket;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($answerStatusTicket)
    {
        $this->answerStatusTicket = $answerStatusTicket;

        // info($answerStatusTicket);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('answerStatus.' . $this->answerStatusTicket[1]);
        // dd(new PrivateChannel('channelStatus.' . $this->answerStatusTicket[1]));
    }
}
