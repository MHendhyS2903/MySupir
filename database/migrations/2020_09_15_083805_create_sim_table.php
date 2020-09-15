<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sim', function (Blueprint $table) {
            $table->increments('simID');
            $table->string('simNumber');
            $table->string('simType');
            $table->integer('driverID')->unsigned();
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
        Schema::dropIfExists('sim');
    }
}
