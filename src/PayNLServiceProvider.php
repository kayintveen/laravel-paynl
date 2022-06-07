<?php

namespace DenizTezcan\LaravelPayNL;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class PayNLServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/paynl.php' => config_path('paynl.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('paynl', function () {
            return new PayNL();
        });
    }

    public function provides()
    {
        return ['paynl'];
    }
}