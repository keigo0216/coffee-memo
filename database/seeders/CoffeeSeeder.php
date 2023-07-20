<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // coffeesテーブルのシーダーを作成する
        $params = [
            [
                'id' => '1',
                'user_id' => '1',
                'brewing_method_id' => '1',
                'country_id' => '3',
                'way_to_drink_id' => '1',
                'name' => 'スマトラマンデリン',
                'evaluation' => '4',
                'shop' => 'びぎん',
                'roast_level' => '7',
                'scent_level' => '3',
                'bitterness_level' => '4',
                'acidity_level' => '1',
                'sweetness_level' => '2',
                'clearness_level' => '5',
                'rich_level' => '5',
                'aftertaste_level' => '5',
                'aftercooled_level' => '5',
                'note' => 'コーヒー飲みしか売っていないお店で、コーヒーの味わいに集中することができた。',
                'date' => '2021/06/10'
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'brewing_method_id' => '1',
                'country_id' => '12',
                'way_to_drink_id' => '1',
                'name' => 'ニカラグア',
                'evaluation' => '5',
                'shop' => 'STAND by OVERCOFFEE',
                'roast_level' => '1',
                'scent_level' => '4',
                'bitterness_level' => '1',
                'acidity_level' => '5',
                'sweetness_level' => '5',
                'clearness_level' => '5',
                'rich_level' => '4',
                'aftertaste_level' => '5',
                'aftercooled_level' => '5',
                'note' => 'ニカラグアのコーヒーは、甘みが強く、酸味が少ないのが特徴。
                同時に出てきた、あんみつも美味し買った。
                店内の雰囲気はコーヒーのバーみたいな感じで、落ち着いていて良かった。',
                'date' => '2021/06/11'
            ]
        ];
        DB::table('coffees') -> insert($params);
    }
}
