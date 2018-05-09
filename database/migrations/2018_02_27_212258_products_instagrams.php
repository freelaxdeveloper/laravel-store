<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsInstagrams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_instagrams', function(Blueprint $t) {
            $t->integer('product_id')->unsigned();
            $t->integer('account_instagram_id')->unsigned();
            
            $t->primary(['product_id', 'account_instagram_id']);

            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->foreign('account_instagram_id')->references('id')->on('account_instagrams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_instagrams');
    }
}
