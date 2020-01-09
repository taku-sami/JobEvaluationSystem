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
        DB::table('csvtemplates')->insert([
            'category1' => 'category1',
            'standard1' => 'standard1',
            'category2' => 'category2',
            'standard2' => 'standard2、自主的に行動しているか',
            'category3' => 'category3',
            'standard3' => 'standard3',
            'year' => 'year',
        ]);
    }
}
