<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WayToDrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $param = [
            ['id' => 1, "name" => "ブラック"],
            ['id' => 2, "name" => "ミルク"],
            ['id' => 3, "name" => "砂糖"],
            ['id' => 4, "name" => "アイス"]
        ];
        DB::table('ways_to_drink')->insert($param);
    }
}
