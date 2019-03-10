<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_device_name',100);
            $table->string('subdevice_id',100);
            $table->longText('sub_device_svg1');
            $table->longText('sub_device_svg2');
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
        Schema::dropIfExists('subdevices');
    }
}
