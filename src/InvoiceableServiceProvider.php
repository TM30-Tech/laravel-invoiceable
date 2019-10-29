<?php

namespace TM30\LaravelInvoiceable;

use Illuminate\Support\ServiceProvider;
use TM30\LaravelInvoiceable\Providers\EventServiceProvider;

class InvoiceableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations'),
            __DIR__.'/Models/ModelTrait/' => app_path(),
        ]);
    }
}
