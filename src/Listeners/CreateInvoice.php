<?php

namespace TM30\LaravelInvoiceable\Listeners;

use TM30\LaravelInvoiceable\Models\Invoice;
use TM30\LaravelInvoiceable\Events\InvoiceableCreated;

class CreateInvoice
{
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
    public function handle(InvoiceableCreated $event)
    {
        app('log')->info($event->model);

        // Create an Unpaid Invoice
        $invoice = new Invoice();

        $invoice->user_id = $event->model->invoice_user;
        $invoice->quantity = 1;
        $invoice->reference = $event->model->invoice_reference;
        $invoice->amount = $event->model->invoice_amount;
        $invoice->invoiceable_id = $event->model->id;
        $invoice->invoiceable_type = $event->model->getMorphClass();

        $invoice->save();

    }
}
