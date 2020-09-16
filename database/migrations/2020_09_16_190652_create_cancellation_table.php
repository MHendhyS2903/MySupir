<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancellationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancellation', function (Blueprint $table) {
            $table->increments('cancelID');
            $table->integer('orderID')->unsigned();
            $table->string('reason');
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
        Schema::dropIfExists('cancellation');
    }
}
