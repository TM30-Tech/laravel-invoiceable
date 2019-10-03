<?php

namespace TM30\LaravelInvoiceable\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use TM30\LaravelInvoiceable\Events\InvoiceableCreated;
use TM30\LaravelInvoiceable\Listeners\CreateInvoice;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        InvoiceableCreated::class => [
            CreateInvoice::class,
        ],
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
