<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->nullable();
            $table->string('title','50');
            $table->string('small-description','50')->nullable();
            $table->longText('large_description')->nullable();
            $table->text('image');
            $table->enum('status',['waitting','approved','rejected'])->nullable();
            $table->string('longitude','50')->nullable();
            $table->string('latitude','50')->nullable();
            $table->float('price')->nullable();
            $table->enum('outofstock_status',['in stock','out of stock','pre-order'])->nullable();
            $table->dateTime('date_available')->nullable();
            $table->enum('weight_class',['kilogram','gram','pound'])->nullable();
            $table->float('weight')->nullable();
            $table->enum('length_class',['centimeter','millimeter','inch'])->nullable();
            $table->text('dimensions')->nullable();
            $table->text('manufacturer')->nullable();
            $table->text('attributes')->nullable();
            $table->text('discounts')->nullable();
            $table->float('discount_percentage')->nullable();
            $table->dateTime('discount_start_date')->nullable();
            $table->dateTime('discount_end_date')->nullable();
            $table->integer('inventory_quantity')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type',50)->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();




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
        Schema::dropIfExists('products');
    }
}
