<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qty');
            $table->decimal('price', 13, 2);
            $table->decimal('subtotal', 13, 2);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sale_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
}
