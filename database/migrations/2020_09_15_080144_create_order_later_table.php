<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_later', function (Blueprint $table) {
            $table->increments('orderLaterID');
            $table->integer('driverID')->unsigned();
            $table->integer('id')->unsigned();
            $table->string('pickupLoc');
            $table->string('deliveryLoc');
            $table->date('rentalDate');
            $table->time('rentalTIme');
            $table->string('status');
            $table->string('rates');
            $table->timestamps();

            $table->foreign('driverID')
                ->references('driverID')
                ->on('drivers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('order_later');
    }
}
