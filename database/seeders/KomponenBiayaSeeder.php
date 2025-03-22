<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KomponenBiaya;
use App\Models\KategoriBiaya;
use Faker\Factory as Faker;

class KomponenBiayaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $kategoriIds = KategoriBiaya::pluck('id')->toArray();

        for ($i = 0; $i < 15; $i++) {
            KomponenBiaya::create([
                'kategori_id' => $faker->randomElement($kategoriIds),
                'name' => $faker->word,
                'kode' => $faker->unique()->word,
                'biaya' => $faker->randomFloat(2, 1000, 10000),
            ]);
        }
    }
}
