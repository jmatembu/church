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
            [
                'parish.layout.partials.footer',
                'parish.contact',
            ],
            function ($view) {
                $contacts = request()->user()->parish->contacts;
                $view->withContacts($contacts);
            }
        );

        View::composer(
            [
                'parish.layout.partials.navigation',
                'parish.news.index',
                'parish.news.show',
                'parish.projects.index',
                'parish.projects.show',
                'parish.events.index',
                'parish.events.show',
                'parish.contact',
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
