<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBiaya;

class KategoriBiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBiaya::create([
            'name' => 'Kategori A',
            'code' => 'KA001',
            'color' => 'red',
        ]);
        
        KategoriBiaya::create([
            'name' => 'Kategori B',
            'code' => 'KB002',
            'color' => 'green',
        ]);
        
        KategoriBiaya::create([
            'name' => 'Kategori C',
            'code' => 'KC003',
            'color' => 'blue',
        ]);
    }
}
