<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function(Blueprint $t) {
            $t->integer('product_id')->unsigned();
            $t->integer('category_id')->unsigned();
            
            $t->primary(['product_id', 'category_id']);

            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_categories');
    }
}
