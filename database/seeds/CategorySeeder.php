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
            'year' => 2019,
            'category' => '規律性',
            'standard' => '組織のルールにのっとった行動ができているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2019,
            'category' => '積極性',
            'standard' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2019,
            'category' => '責任性',
            'standard' => '自分の責任を認識し、与えられた役割を全うしているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2020,
            'category' => '規律性',
            'standard' => '組織のルールにのっとった行動ができているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2020,
            'category' => '積極性',
            'standard' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2020,
            'category' => '責任性',
            'standard' => '自分の責任を認識し、与えられた役割を全うしているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2021,
            'category' => '規律性',
            'standard' => '組織のルールにのっとった行動ができているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2021,
            'category' => '積極性',
            'standard' => '上司の指示を待つだけでなく、自主的に行動しているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'year' => 2021,
            'category' => '責任性',
            'standard' => '自分の責任を認識し、与えられた役割を全うしているか',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
