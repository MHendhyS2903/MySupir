<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_now', function (Blueprint $table) {
            $table->increments('orderNowID');
            $table->integer('driverID')->unsigned();
            $table->integer('id')->unsigned();
            $table->string('pickupLoc');
            $table->string('deliveryLoc');
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
        Schema::dropIfExists('order_now');
    }
}
