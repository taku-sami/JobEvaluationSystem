<?php

use Illuminate\Database\Seeder;

class CsvTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('csv_templates')->insert([
            'year' => 'year',
            'category' => 'category',
            'standard' => 'standard',
        ]);
    }
}
