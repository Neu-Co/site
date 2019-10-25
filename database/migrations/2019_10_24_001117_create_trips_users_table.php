<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_users', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_users');
    }
}
