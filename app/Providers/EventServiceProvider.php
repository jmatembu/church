<?php

namespace App\Providers;

use App\Events\Parish\EventSaved;
use App\Events\Parish\ParishSaved;
use App\Events\Parish\PostSaved;
use App\Events\Parish\ProjectSaved;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventSaved::class => [
            \App\Listeners\Parish\UploadMedia::class,
        ],
        ProjectSaved::class => [
            \App\Listeners\Parish\UploadMedia::class,
        ],
        PostSaved::class => [
            \App\Listeners\Parish\UploadMedia::class,
        ],
        ParishSaved::class => [
            \App\Listeners\Parish\UploadMedia::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
