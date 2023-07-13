<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    // 実行したいシーダークラスを登録する
    private const SEEDERS = [
        UserSeeder::class,
        BrewingMethodSeeder::class,
        CountrySeeder::class,
        WayToDrinkSeeder::class,
        CoffeeSeeder::class
    ];

    public function run(): void
    {
        // 登録したシーダークラスを順番に実行する
        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }

    }
}
