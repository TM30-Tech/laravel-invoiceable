<?php

namespace TM30\LaravelInvoiceable\Models;

use TM30\LaravelInvoiceable\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use UsesUuid;
    protected $guarded = [];

    /**
     * Get the invoiceable entity that the invoice belongs to.
     */
    public function invoiceable()
    {
        return $this->morphTo();
    }


}
