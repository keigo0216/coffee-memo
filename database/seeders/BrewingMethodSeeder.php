<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrewingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $params = [
            ['id' => 1, 'name' => 'ペーパードリップ'],
            ['id' => 2, 'name' => 'ネルドリップ'],
            ['id' => 3, 'name' => 'エスプレッソ'],
            ['id' => 4, 'name' => 'プレス'],
            ['id' => 5, 'name' => 'ウォータドリップ']
        ];
        DB::table('brewing_methods')->insert($params);
    }
}
