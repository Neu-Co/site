<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CarsTableSeeder::class,
            ProfilesTableSeeder::class,
            PlacesTableSeeder::class,
            TripsTableSeeder::class,
            ReviewsTableSeeder::class,
            CarsUsersXrefTableSeeder::class,
            TripsUsersXrefTableSeeder::class,
        ]);
    }
}
