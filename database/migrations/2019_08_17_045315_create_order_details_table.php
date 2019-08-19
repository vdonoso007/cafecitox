<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->foreign('order')->references('id')->on('orders');
            $table->integer('product')->unsigned();
            $table->foreign('product')->references('id')->on('products');
            $table->integer('quantity')->unsigned();
            $table->decimal('price', 18, 2);
            $table->decimal('subtotal', 18, 2);
            $table->char('status');
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
        Schema::dropIfExists('order_details');
    }
}
