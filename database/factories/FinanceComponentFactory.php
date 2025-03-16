<?php

namespace Database\Factories;

use App\Models\FinanceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinanceComponent>
 */
class FinanceComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'finance_category_id' => fake()->numberBetween(1,4),
            // 'finance_category_id' => FinanceCategory::factory(),
            'name' => fake()->word(),
            'amount' => fake()->numberBetween(30000, 250000),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
