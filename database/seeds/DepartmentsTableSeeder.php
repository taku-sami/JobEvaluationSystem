<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'dep_name' => '開発部',
        ]);
        DB::table('departments')->insert([
            'dep_name' => '人事部',
        ]);
        DB::table('departments')->insert([
            'dep_name' => '営業部',
        ]);
    }
}
