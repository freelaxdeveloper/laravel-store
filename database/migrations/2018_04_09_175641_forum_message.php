<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_messages', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->integer('id_topic')->unsigned();
            $table->integer('id_theme')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->text('message');
            $table->integer('time')->unsigned();
            $table->integer('rating')->default(0);
            $table->integer('rating_up')->default(0)->unsigned();
            $table->integer('rating_down')->default(0)->unsigned();
            $table->unsignedSmallInteger('group_show')->default(0)->comment('Права для просмотра');
            $table->unsignedSmallInteger('group_edit')->default(0)->comment('Права для редактирования');
            $table->integer('edit_id_user')->unsigned()->nullable();
            $table->integer('edit_time')->nullable();
            $table->integer('edit_count')->default(0);
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('forum_categories');
            $table->foreign('id_topic')->references('id')->on('forum_topics');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('edit_id_user')->references('id')->on('users');
            $table->foreign('id_theme')->references('id')->on('forum_themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_messages');
    }
}
