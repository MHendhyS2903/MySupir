<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund', function (Blueprint $table) {
            $table->increments('refundID');
            $table->integer('driverID')->unsigned();
            $table->string('total');
            $table->string('bank');
            $table->string('accountNumber');
            $table->string('clientName');
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
        Schema::dropIfExists('refund');
    }
}
