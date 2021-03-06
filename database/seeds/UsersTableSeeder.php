<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=7; $i++) {
            DB::table('cash')->insert([
                'user_id' => $i,
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Администратор',
            'email' =>'admin@truck.ru',
            'cash_id' => 1,
            'isExecutor' => 10,
            'password' => bcrypt('klon5031'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Кирилл Трифонов',
            'email' =>'flancyk.flancyk@yandex.ru',
            'cash_id' => 2,
            'isExecutor' => 0,
            'password' => bcrypt('k123123'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Максим',
            'email' => Str::random(10).'@gmail.com',
            'cash_id' => 3,
            'isExecutor' => 1,
            'password' => bcrypt('secret'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Антон',
            'email' => Str::random(10).'@gmail.com',
            'cash_id' => 4,
            'isExecutor' => 1,
            'password' => bcrypt('secret'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Сергей',
            'email' => Str::random(10).'@gmail.com',
            'cash_id' => 5,
            'isExecutor' => 1,
            'password' => bcrypt('secret'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Алексей',
            'email' => Str::random(10).'@gmail.com',
            'cash_id' => 6,
            'isExecutor' => 1,
            'password' => bcrypt('secret'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Кирилл Трифонов',
            'email' =>'flancyk.flancyk@gmail.com',
            'cash_id' => 7,
            'isExecutor' => 1,
            'password' => bcrypt('klon5031'),
            'phone' => '8-(800)-888-88-88',
            'created_at' => Carbon::now(),
        ]);

        for($i=1; $i<=7; $i++) {
            DB::table('passports')->insert([
                'user_id' => $i,
                'name' => '',
                'surname' => '',
                'patronymic' => '',
                'number' => '',
                'city' => '',
                'date' => '',
                'verify' => 0,
            ]);
        }
    }
}
