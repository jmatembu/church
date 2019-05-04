<?php

namespace App\Listeners\Parish;

use App\Events\Parish\EventSaved;
use App\Events\Parish\ParishSaved;
use App\Events\Parish\PostSaved;
use App\Events\Parish\ProjectSaved;
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
     * @param  EventSaved  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event instanceof EventSaved) {
            $this->upload($event->event);
        } elseif ($event instanceof ProjectSaved) {
            $this->upload($event->project);
        } elseif ($event instanceof PostSaved) {
            $this->upload($event->post);
        } elseif ($event instanceof ParishSaved) {
            $this->upload($event->parish, 'banner_image');
        }

    }
}
