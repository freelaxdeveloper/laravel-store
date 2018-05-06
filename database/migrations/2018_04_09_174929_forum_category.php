<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('position')->comment('для сортировки');
            $table->string('name');
            $table->unsignedSmallInteger('group_show')->default(0)->comment('Права для просмотра раздела');
            $table->unsignedSmallInteger('group_write')->default(0)->comment('Права для создания тем в разделе	');
            $table->unsignedSmallInteger('group_edit')->default(0)->comment('Права для редактирования');
            $table->mediumText('description');
            //$table->softDeletes(); # для мягкого удаления
            $table->integer('user_id')->unsigned()->comment('создатель категории');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_categories');
    }
}
