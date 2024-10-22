<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'code' => '000',
            'author_id' => 3,
            'name' => 'Umum',
            'sub_name' => 'Umum',
            'activity' => 'Umum',
            'transaction' => 'Umum',
            'color' => 'blue',
        ]);
        Category::create([
            'code' => '000.1',
            'author_id' => 3,
            'name' => 'Umum',
            'sub_name' => 'KETATAUSAHAAN DAN KERUMAHTANGGAAN',
            'activity' => 'KETATAUSAHAAN DAN KERUMAHTANGGAAN',
            'transaction' => 'KETATAUSAHAAN DAN KERUMAHTANGGAAN',
            'color' => 'red',
        ]);
        Category::create([
            'code' => '000.1.2.3',
            'author_id' => 3,
            'name' => 'Umum',
            'sub_name' => 'KETATAUSAHAAN DAN KERUMAHTANGGAAN',
            'activity' => 'Perjalanan Dinas Dalam Negeri',
            'transaction' => 'Perjalanan Dinas Pegawai',
            'color' => 'green',
        ]);
        Category::create([
            'code' => '400.3',
            'author_id' => 3,
            'name' => 'KESEJAHTERAAN RAKYAT',
            'sub_name' => 'PENDIDIKAN',
            'activity' => 'Pendidikan Dasar dan Menengah',
            'transaction' => 'Kurikulum, bahan ajar, alat bantu pembelajaran',
            'color' => 'yellow',
        ]);
        
        // Category::factory(3)->create();
    }
}
