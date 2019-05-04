<?php

namespace App\Listeners\Parish;

use App\Events\Parish\EventCreated;
use App\Traits\UploadsMedia;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadMedia
{
    use UploadsMedia;
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
     * @param  EventCreated  $event
     * @return void
     */
    public function handle(EventCreated $event)
    {
        $this->upload($event->event);
    }
}
