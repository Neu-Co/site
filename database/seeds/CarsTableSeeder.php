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
            'chassis' => 'VF1 2RFL1H 99078422',
            'valid_until' => '2020-10-10',
        ]);
        DB::table('cars')->insert([
            'chassis' => 'VF1 2RFL1H 99078423',
            'valid_until' => '2018-10-10',
        ]);
    }
}
