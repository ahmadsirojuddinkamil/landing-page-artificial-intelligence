<?php

namespace Modules\Chat\Listeners;

use App\Events\ResponseStatusTicket;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Chat\Events\TicketStatusUpdated;

class TicketStatusUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TicketStatusUpdated $event)
    {
        // $event->dataStatusNow;
        // $dataStatusNow = $event->dataStatusNow;
        // dd("Ticket status updated: ", $dataStatusNow);
    }
}
