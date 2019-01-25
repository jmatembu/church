<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['parish.layout.partials.footer'],
            function ($view) {
                $contacts = request()->user()->parish->contacts;
                $view->withContacts($contacts);
            }
        );

        View::composer(
            [
                'parish.layout.partials.navigation',
                'parish.projects.index',
                'parish.projects.show',
                'parish.events.index',
                'parish.events.show'
            ],
            function ($view) {
                $parish = request()->user()->parish;
                $view->withParish($parish);
            }
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
