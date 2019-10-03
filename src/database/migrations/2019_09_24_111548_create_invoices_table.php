<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary ();
            $table->string("reference")->nullable();
            $table->uuid("user_id");
            $table->integer("quantity"); //unit
            $table->string("amount"); // Unit Price
            $table->boolean("paid")->default(false);
            $table->string("invoiceable_id");
            $table->string("invoiceable_type");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
