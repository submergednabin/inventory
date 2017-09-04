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
            $table->string('item_name')->nullable();
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')
                ->references('id')
                ->on('products');
            $table->string('image')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories');
            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')
                ->references('id')
                ->on('units');
            $table->string('sku')->nullable();
            $table->string('cost_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->boolean('status')->default(1);
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
