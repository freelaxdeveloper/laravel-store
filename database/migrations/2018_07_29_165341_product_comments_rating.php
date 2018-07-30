<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductCommentsRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_comments', function(Blueprint $table)
        {
            $table->dropColumn('rating');
            $table->float('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_comments', function(Blueprint $table)
        {
            $table->dropColumn('rating');
            $table->enum('rating', range(1, 5))->default(5);
        });
    }
}
