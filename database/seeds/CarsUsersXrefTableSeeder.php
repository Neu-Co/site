<?php

use Illuminate\Database\Seeder;

class CarsUsersXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars_users_xref')->insert([
            'driver_id' => 1,
            'car_id' => 1,
        ]);
        DB::table('cars_users_xref')->insert([
            'driver_id' => 1,
            'car_id' => 2,
        ]);
    }
}
