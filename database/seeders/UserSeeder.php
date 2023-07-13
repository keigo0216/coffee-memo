<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usersテーブルのシーダーを作成する
        $params = [
            [
                'id' => '1',
                'name' => 'test',
                'email' => 'test@test',
                'password' => 'testtest'
            ]
        ];
        DB::table('users')->insert($params);
    }
}
