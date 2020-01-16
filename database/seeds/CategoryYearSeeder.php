<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_years')->insert([
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('category_years')->insert([
            'year' => 2020,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('category_years')->insert([
            'year' => 2021,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
