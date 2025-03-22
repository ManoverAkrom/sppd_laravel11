<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Surat;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Institute;
use Illuminate\Support\Str;
use App\Models\Pemberitahuan;
use App\Models\TravelCategory;
// use App\Models\FinanceCategory;
use App\Models\TravelComponent;
use Illuminate\Database\Seeder;
use App\Models\FinanceComponent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([UserSeeder::class, CategorySeeder::class, BudgetSeeder::class, KategoriBiayaSeeder::class, KomponenBiayaSeeder::class]);

        Post::factory(30)->recycle([
            User::all(),
            Category::all(),
            // Budget::all(),
        ])->create();

        Category::factory(3)->create();
        User::factory(10)->create();
        Institute::factory(1)->create();
        // FinanceCategory::factory(5)->create();
        // FinanceComponent::factory(20)->create();
        // TravelCategory::factory(5)->create();
        // TravelComponent::factory(20)->create();
        // Budget::factory(4)->create();

        Pemberitahuan::factory(7)->create();
    }
}
