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
        DB::table('users')->insert([
            'name' => 'Максим',
            'email' => Str::random(10).'@gmail.com',
            'auto_id' => 1,
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Антон',
            'email' => Str::random(10).'@gmail.com',
            'auto_id' => 2,
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Сергей',
            'email' => Str::random(10).'@gmail.com',
            'auto_id' => 3,
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Алексей',
            'email' => Str::random(10).'@gmail.com',
            'auto_id' => 4,
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
        ]);
    }
}
