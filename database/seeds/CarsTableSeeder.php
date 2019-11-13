<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'immatriculation' => '123456NC',
            'model' => 'Citroën C3',
            'valid_until' => '2020-10-10',
        ]);
        DB::table('cars')->insert([
            'immatriculation' => '420420NC',
            'model' => '206',
            'valid_until' => '2018-10-10',
        ]);
    }
}
