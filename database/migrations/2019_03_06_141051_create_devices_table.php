<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_name', 100)->unique();
            $table->string('device_id');
            $table->integer('user_id');
            $table->integer('device_use_line');
            $table->json('device_connect_json')->nullable();
            $table->string('sub_device_true_or_false');
            $table->longText('svg_device_1');
            $table->longText('svg_device_2');
            $table->integer('device_use_mA');
            $table->integer('device_use_V');
            $table->json('necessary_sub_device')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
