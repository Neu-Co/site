<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'TestingDriver',
            'email' => 'driver@neu-co.nc',
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'driver' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'TestingPassenger',
            'email' => 'passenger@neu-co.nc',
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'driver' => '0'
        ]);
    }
}
