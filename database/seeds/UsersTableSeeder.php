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
            'name' => 'driver',
            'email' => 'driver@neu-co.nc',
            'phone' => '101010',
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'driver' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'passenger',
            'email' => 'passenger@neu-co.nc',
            'phone' => '420420',
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'driver' => '0'
        ]);
    }
}
