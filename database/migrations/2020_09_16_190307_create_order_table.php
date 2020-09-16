<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('orderID');
            $table->integer('driverID')->unsigned();
            $table->integer('id')->unsigned();
            $table->integer('categoryID')->unsigned();
            $table->date('startDate');
            $table->date('endDate')->nullable();
            $table->time('startTime');
            $table->time('endTime')->nullable();
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

            $table->foreign('categoryID')
                ->references('categoryID')
                ->on('categories')
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
        Schema::dropIfExists('order');
    }
}
