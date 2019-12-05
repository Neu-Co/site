<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsUsersXrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_users_xref', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('passenger_id');
            $table->boolean('status')->default(0);
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('passenger_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_users_xref');
    }
}
