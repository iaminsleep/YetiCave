<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Алекс',
                'email' => 'alex@email.com',
                'password' => bcrypt('password@'),
                'contacts' => '89997773355',
                'signup_date' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'name' => 'Елена',
                'email' => 'elena@email.com',
                'password' => bcrypt('password@'),
                'contacts' => '89995558844',
                'signup_date' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'name' => 'Артём',
                'email' => 'artem@email.com',
                'password' => bcrypt('password@'),
                'contacts' => '79992223311',
                'signup_date' => Carbon::now()->timezone('Europe/Moscow'),
            ],
            [
                'name' => 'Саша',
                'email' => 'sasha@email.com',
                'password' => bcrypt('password@'),
                'contacts' => '79994446600',
                'signup_date' => Carbon::now()->timezone('Europe/Moscow'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
