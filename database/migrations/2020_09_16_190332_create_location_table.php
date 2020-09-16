<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('locID');
            $table->integer('orderID')->unsigned();
            $table->string('pickupLoc');
            $table->string('pickupLong');
            $table->string('pickupLat');
            $table->string('deliveryLoc');
            $table->string('deliveryLong');
            $table->string('deliveryLat');
            $table->timestamps();

            $table->foreign('orderID')
                ->references('orderID')
                ->on('order')
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
        Schema::dropIfExists('location');
    }
}
