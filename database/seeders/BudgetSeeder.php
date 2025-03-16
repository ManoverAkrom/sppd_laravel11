<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Budget::create([
            'author_id' => 5,
            'year' => '2024',
            'total_budget' => 250000000,
            'spend_budget' => 0,
            'remaining_budget' => 250000000,
            'budget_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Budget::create([
            'author_id' => 5,
            'year' => '2023',
            'total_budget' => 200000000,
            'spend_budget' => 200000000,
            'remaining_budget' => 0,
            'budget_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Budget::create([
            'author_id' => 5,
            'year' => '2022',
            'total_budget' => 125000000,
            'spend_budget' => 125000000,
            'remaining_budget' => 0,
            'budget_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
