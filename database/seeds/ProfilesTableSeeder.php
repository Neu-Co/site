<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'cigarette' => 1,
            'animals' => 0,
            'music' => 1,
            'total_passengers' => 8,
            'total_trips' => 4
        ]);
        DB::table('profiles')->insert([
            'user_id' => 2,
            'total_passengers' => 0,
            'total_trips' => 0
        ]);
    }
}
