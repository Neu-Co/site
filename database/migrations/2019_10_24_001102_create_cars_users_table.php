<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_users', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('car_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_users');
    }
}
