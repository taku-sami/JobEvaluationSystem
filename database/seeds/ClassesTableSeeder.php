<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_classes')->insert([
            'class_name' => '被評価者',
            'class_auth' => 'staff',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('staff_classes')->insert([
            'class_name' => '１次承認者',
            'class_auth' => 'boss1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('staff_classes')->insert([
            'class_name' => '２次承認者',
            'class_auth' => 'boss2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
