<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(ServicesSeeeder::class);
        $this->call(ReviewsSeeder::class);
    }
}
