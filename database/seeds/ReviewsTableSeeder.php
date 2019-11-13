<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'author_id' => 2,
            'driver_id' => 1,
            'stars' => 4,
            'body' => "best driver ever woaw thanks Mr.Schumacher",
        ]);
        DB::table('reviews')->insert([
            'author_id' => 2,
            'driver_id' => 1,
            'stars' => 3,
        ]);
    }
}
