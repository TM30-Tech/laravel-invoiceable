<?php
namespace TM30\LaravelInvoiceable\Traits;

use Illuminate\Support\Facades\Log;
use TM30\LaravelInvoiceable\Events\InvoiceableCreated;
use TM30\LaravelInvoiceable\Models\Invoice;

trait Invoiceable {
    /**
     *  Retrieve Corresponding Invoice
     *  Requires user_id, amount field in database
     * @return mixed
     */
    public function invoice() {
        return $this->morphOne( Invoice::class, 'invoiceable' );
    }


    protected $dispatchesInvoiceableEvents = [
        'created' => InvoiceableCreated::class,
    ];

    /**
     * Fire a custom model event for the given event.
     *
     * @param  string  $event
     * @param  string  $method
     * @return mixed|null
     */
    protected function fireCustomModelEvent($event, $method)
    {

        $dispatchesInvoiceableEvents = $this->dispatchesInvoiceableEvents;

        if (! isset($dispatchesInvoiceableEvents[$event])) {
            return;
        }

        $result = static::$dispatcher->$method(new $dispatchesInvoiceableEvents[$event]($this));

        if (! is_null($result)) {
            return $result;
        }
    }


    /**
     * Update generic status field to true
     *
     */
    protected function fulfill(){
        Log::debug("Successfully paid for" . $this->getName());
    }

    // User to pay invoice
    public function getInvoiceUserAttribute () {
        return $this->user_id;
    }

    // Amount for invoice
    public function getInvoiceAmountAttribute() {
        return $this->amount;
    }

    // Reference for Invoice
    public function getInvoiceReferenceAttribute() {
        return $this->reference;
    }

}
