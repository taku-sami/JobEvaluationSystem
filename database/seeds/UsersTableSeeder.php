<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'boss2',
            'email' => 'boss2@gmail.com',
            'department' => 'dev',
            'class' => 'boss2',
            'password' => bcrypt('password'),
        ]);
    }
}
