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
            DepartmentsTableSeeder::class,
            ClassesTableSeeder::class,
            UsersTableSeeder::class,
            CategorySeeder::class,
            CategoryYearSeeder::class,
        ]);
    }
}
