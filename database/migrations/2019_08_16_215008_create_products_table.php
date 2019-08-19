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
            $table->string('title', 50);
            $table->string('name', 100);
            $table->string('description', 300);
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('product_groups');
            $table->decimal('price', 8, 2);
            $table->integer('stock')->unsigned();
            $table->string('image', 150);
            $table->boolean('enabled');
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
