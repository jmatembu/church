<?php

namespace App\Providers;

use App\Parish;
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
                'parish.*',
                'layouts.*',
                'accounts.*'
            ],
            function ($view) {
                $parish = request()->parish;

                if (request()->user()) {
                    $parish = request()->user()->parish;
                }

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
