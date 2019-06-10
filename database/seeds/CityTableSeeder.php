<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'name' => 'Москва',
            'latitude' => '55.580748',
            'longitude' => '36.8251141',
            'created_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
            'name' => 'Санкт-Петербург',
            'latitude' => '59.9390094',
            'longitude' => '29.5302954',
            'created_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
            'name' => 'Владимир',
            'latitude' => '56.1375823',
            'longitude' => '40.3360084',
            'created_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
            'name' => 'Нижний-Новгород',
            'latitude' => '56.2926609',
            'longitude' => '43.7866625',
            'created_at' => Carbon::now(),
        ]);
    }
}
