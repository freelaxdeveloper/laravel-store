<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_base_id')->unsigned();
            $table->string('browser', 64);
            $table->string('platform', 64);
            $table->string('device', 64);
            $table->json('info');
            $table->string('ip', 64);
            $table->timestamps();

            $table->foreign('user_base_id')->references('id')->on('users_bases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_devices');
    }
}
