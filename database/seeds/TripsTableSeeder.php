<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
            'departure' => 1,
            'arrival' => 3,
            'date' => '2019-11-25 14:00:00',
            'price' => 1000,
            'remaining_seats' => 2,
            'driver_id' => 1,
            'car_id' => 2,
        ]);
        DB::table('trips')->insert([
            'departure' => 3,
            'arrival' => 1,
            'date' => '2019-11-05 08:30:00',
            'price' => 1200,
            'remaining_seats' => 3,
            'driver_id' => 1,
            'car_id' => 1,
        ]);
    }
}
