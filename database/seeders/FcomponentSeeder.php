<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fcomponent;

class FcomponentSeeder extends Seeder
{
    public function run()
    {
        Fcomponent::factory()->count(10)->create();
    }
}
