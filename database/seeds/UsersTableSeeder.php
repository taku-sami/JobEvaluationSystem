<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');

        $dummy_users = [[
            'name' => $faker->name,
            'email' => 'admin@gmail.com',
            'department' => "システム管理者",
            'class' => 'システム管理者',
            'auth' => 'admin',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
            [
                'name' => $faker->name,
                'email' => 'dev_staff1@gmail.com',
                'department' => "開発部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'dev_staff2@gmail.com',
                'department' => "開発部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'dev_staff3@gmail.com',
                'department' => "開発部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'dev_boss1@gmail.com',
                'department' => "開発部",
                'class' => '課長',
                'auth' => 'boss1',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'dev_boss2@gmail.com',
                'department' => "開発部",
                'class' => '部長',
                'auth' => 'boss2',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'sall_staff1@gmail.com',
                'department' => "営業部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'sall_staff2@gmail.com',
                'department' => "営業部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'sall_staff3@gmail.com',
                'department' => "営業部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'sall_boss1@gmail.com',
                'department' => "営業部",
                'class' => '課長',
                'auth' => 'boss1',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'sall_boss2@gmail.com',
                'department' => "営業部",
                'class' => '部長',
                'auth' => 'boss2',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'hr_staff1@gmail.com',
                'department' => "人事部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'hr_staff2@gmail.com',
                'department' => "人事部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'hr_staff3@gmail.com',
                'department' => "人事部",
                'class' => 'スタッフ',
                'auth' => 'staff',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'hr_boss1@gmail.com',
                'department' => "人事部",
                'class' => '課長',
                'auth' => 'boss1',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => 'hr_boss2@gmail.com',
                'department' => "人事部",
                'class' => '部長',
                'auth' => 'boss2',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($dummy_users as $users){
            DB::table('users')->insert([
                'name' => $users['name'],
                'email' => $users['email'],
                'department' => $users['department'],
                'class' => $users['class'],
                'auth' => $users['auth'],
                'password' => $users['password'],
                'created_at' => $users['created_at'],
                'updated_at' => $users['updated_at'],
            ]);
        }
    }
}
