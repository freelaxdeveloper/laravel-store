<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topics', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('time_create')->unsigned();
            $table->integer('time_last')->unsigned()->comment('Время обновления (для сортировки)');
            $table->integer('id_category')->unsigned();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->unsignedSmallInteger('group_show')->default(0)->comment('Права для просмотра раздела');
            $table->unsignedSmallInteger('group_write')->default(0)->comment('Права для создания тем в разделе	');
            $table->unsignedSmallInteger('group_edit')->default(0)->comment('Права для редактирования');
            $table->enum('theme_create_with_wmid', ['0', '1'])->default(0)->comment('Создание тем только с WMID	');
            $table->enum('theme_view', ['0', '1'])->default(1)->comment('Отображать темы в списке новых и обновленных');
            $table->integer('user_id')->unsigned()->comment('создатель топика');
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('forum_categories')->onDelete('cascade');
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
        Schema::drop('forum_topics');
    }
}
