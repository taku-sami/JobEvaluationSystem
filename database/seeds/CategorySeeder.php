<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category1' => '規律性',
            'standard1' => '組織のルールにのっとった行動ができているか',
            'category2' => '積極性',
            'standard2' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'category3' => '被評価者',
            'standard3' => '自分の責任を認識し、与えられた役割を全うしているか',
            'year' => 2019,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'category1' => '規律性',
            'standard1' => '組織のルールにのっとった行動ができているか',
            'category2' => '積極性',
            'standard2' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'category3' => '被評価者',
            'standard3' => '自分の責任を認識し、与えられた役割を全うしているか',
            'year' => 2020,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'category1' => '規律性',
            'standard1' => '組織のルールにのっとった行動ができているか',
            'category2' => '積極性',
            'standard2' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'category3' => '被評価者',
            'standard3' => '自分の責任を認識し、与えられた役割を全うしているか',
            'year' => 2021,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
