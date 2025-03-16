<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'author_id' => 5,
            // 'year' => $this->faker->unique()->numberBetween(2010, 2021),
            // 'total_budget' => $this->faker->numberBetween(120000000, 230000000),
            // 'spend_budget' => $this->faker->numberBetween(120000000, 230000000),
            // 'remaining_budget' => 0,
            // 'budget_status' => 'NON-ACTIVE',
            // 'created_at' => $this->faker->dateTimeThisDecade(),
            // 'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
