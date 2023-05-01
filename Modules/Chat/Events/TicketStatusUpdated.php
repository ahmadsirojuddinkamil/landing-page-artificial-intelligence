<?php

namespace Modules\Chat\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dataStatusNow;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($dataStatusNow)
    {
        $this->dataStatusNow = $dataStatusNow;

        info('ini data status modul', $dataStatusNow);
        // dd($dataStatusNow);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // dd(new PrivateChannel('channelStatus.' . $this->dataStatusNow[1]));
        return new PrivateChannel('channelStatus.' . $this->dataStatusNow[1]);
    }
}
