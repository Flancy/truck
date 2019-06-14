<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto')->insert([
            'name' => 'Mitsubishi',
            'image' => 'storage/auto/1.jpg',
            'weight' => 'до 20',
            'city_id' => 1,
            'user_id' => 1,
            'autocategories_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('auto')->insert([
            'name' => 'Mitsubishi',
            'image' => 'storage/auto/1.jpg',
            'weight' => 'до 10',
            'city_id' => 1,
            'user_id' => 2,
            'autocategories_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('auto')->insert([
            'name' => 'Mitsubishi',
            'image' => 'storage/auto/1.jpg',
            'weight' => 'до 40',
            'city_id' => 2,
            'user_id' => 3,
            'autocategories_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('auto')->insert([
            'name' => 'Mitsubishi',
            'image' => 'storage/auto/1.jpg',
            'weight' => 'до 50',
            'city_id' => 3,
            'user_id' => 4,
            'autocategories_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('auto')->insert([
            'name' => 'Mitsubishi',
            'image' => 'storage/auto/1.jpg',
            'weight' => 'до 50',
            'city_id' => 3,
            'user_id' => 5,
            'autocategories_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
