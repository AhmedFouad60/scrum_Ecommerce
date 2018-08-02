<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_no')->nullable();
            $table->string('invoice_prefix',255)->nullable();
            $table->integer('store_id')->nullable();
            $table->string('store_name',255)->nullable();
            $table->string('store_url',255)->nullable();
            //customer info will be in pivot table user_id ,group_id
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telephone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('payment_firstname', 255)->nullable();
            $table->string('payment_lastname', 255)->nullable();
            $table->string('payment_company', 255)->nullable();
            $table->string('payment_address_1', 255)->nullable();
            $table->string('payment_address_2', 255)->nullable();
            $table->string('payment_city', 255)->nullable();
            $table->string('payment_postcode', 255)->nullable();
            $table->string('payment_country', 255)->nullable();
            $table->integer('payment_country_id')->nullable();
            $table->string('payment_zone', 255)->nullable();
            $table->integer('payment_zone_id')->nullable();
            $table->text('payment_address_format')->nullable();
            $table->text('payment_custom_field')->nullable();
            $table->string('payment_method', 255)->nullable();
            $table->string('payment_code', 255)->nullable();
            $table->string('shipping_firstname', 255)->nullable();
            $table->string('shipping_lastname', 255)->nullable();
            $table->string('shipping_company', 255)->nullable();
            $table->string('shipping_address_1', 255)->nullable();
            $table->string('shipping_address_2', 255)->nullable();
            $table->string('shipping_city', 255)->nullable();
            $table->string('shipping_postcode', 255)->nullable();
            $table->string('shipping_country', 255)->nullable();
            $table->integer('shipping_country_id')->nullable();
            $table->string('shipping_zone', 255)->nullable();
            $table->integer('shipping_zone_id')->nullable();
            $table->text('shipping_address_format')->nullable();
            $table->text('shipping_custom_field')->nullable();
            $table->string('shipping_method', 255)->nullable();
            $table->string('shipping_code', 255)->nullable();
            $table->text('comment')->nullable();
            $table->decimal('total', 50)->nullable();
            $table->integer('order_status_id')->nullable();

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
}
