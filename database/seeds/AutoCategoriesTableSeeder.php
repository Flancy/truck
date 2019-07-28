<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AutoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autocategories')->insert([
            'name' => 'Легковые',
            'image' => '/img/autocategories/7.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Эвакуаторы',
            'image' => '/img/autocategories/1.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Автовышки',
            'image' => '/img/autocategories/2.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Автокраны',
            'image' => '/img/autocategories/3.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Грузовые',
            'image' => '/img/autocategories/4.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Манипуляторы',
            'image' => '/img/autocategories/5.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('autocategories')->insert([
            'name' => 'Миксеры',
            'image' => '/img/autocategories/6.png',
            'created_at' => Carbon::now(),
        ]);
    }
}
