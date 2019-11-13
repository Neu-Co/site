<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->unique();
            $table->unsignedBigInteger('departure');
            $table->unsignedBigInteger('arrival');
            $table->dateTime('date');
            $table->integer('price');
            $table->integer('remaining_seats');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('car_id');
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('departure')->references('id')->on('places');
            $table->foreign('arrival')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
