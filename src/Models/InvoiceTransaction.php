<?php

namespace TM30\LaravelInvoiceable\Models;

use TM30\LaravelInvoiceable\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class InvoiceTransaction extends Model
{
    use UsesUuid;
    protected $guarded = [];
}
