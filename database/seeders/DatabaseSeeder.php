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
        $classSeeder = new ClassSeeder();
        $countrySeeder = new CountrySeeder();
        $studentSeeder = new StudentSeeder();

        $classSeeder->run();
        $countrySeeder->run();
        $studentSeeder->run();
    }
}
