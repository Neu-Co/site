<?php

use Illuminate\Database\Seeder;

class TripsUsersXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips_users_xref')->insert([
            'trip_id' => 1,
            'passenger_id' => 2,
        ]);
        DB::table('trips_users_xref')->insert([
            'trip_id' => 2,
            'passenger_id' => 2,
        ]);
    }
}
