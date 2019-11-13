<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'place' => 'Nouméa',
        ]);
        DB::table('places')->insert([
            'place' => 'Bourail',
        ]);
        DB::table('places')->insert([
            'place' => 'Koné',
        ]);
    }
}
