<?php

namespace TM30\LaravelInvoiceable\Models;

use TM30\LaravelInvoiceable\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Invoice extends Model
{
    use UsesUuid;
    protected $guarded = [];

    /**
     * Get the invoiceable entity that the invoice belongs to.
     */
    public function invoiceable(): MorphTo
    {
        return $this->morphTo();
    }
}
