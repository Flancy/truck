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
            'price' => '1200',
            'city_id' => 1,
            'user_id' => 1,
            'autocategories_id' => 4,
            'created_at' => Carbon::now(),
        ]);
    }
}
