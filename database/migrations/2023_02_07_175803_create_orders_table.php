<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->integer('wc_id');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('device_id')->constrained();
            $table->integer('order_number');
            $table->string('order_date');
            $table->string('status');
            $table->integer('shipping_total');
            $table->integer('shipping_tax_total');
            $table->integer('fee_total');
            $table->integer('discount_total');
            $table->integer('order_total');
            $table->string('order_currency');
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company');
            $table->string('billing_email')->unique();
            $table->integer('billing_phone');
            $table->text('billing_address_1');
            $table->text('billing_address_2');
            $table->integer('billing_postcode');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_country');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company');
            $table->text('shipping_address_1');
            $table->text('shipping_address_2');
            $table->integer('shipping_postcode');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
