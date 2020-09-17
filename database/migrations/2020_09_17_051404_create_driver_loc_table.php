<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverLocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_loc', function (Blueprint $table) {
            $table->increments('driverLocID');
            $table->integer('driverID')->unsigned();
            $table->string('location');
            $table->string('long');
            $table->string('lat');
            $table->timestamps();

            $table->foreign('driverID')
                ->references('driverID')
                ->on('drivers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_loc');
    }
}
