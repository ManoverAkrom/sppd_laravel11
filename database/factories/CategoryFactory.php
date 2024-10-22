<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'author_id' => User::factory(),
            'author_id' => 3,
            'code' => $this->faker->unique()->numberBetween(100, 999),
            'name' => fake()->word(),
            'sub_name' => fake()->sentence(rand(1, 3), false),
            'activity' => fake()->sentence(rand(1, 4), false),
            'transaction' => fake()->sentence(rand(1, 6), false),
            'color' => $this->faker->randomElement(['red', 'green', 'blue', 'yellow', 'lime', 'purple', 'pink', 'teal', 'orange', 'emerald', 'rose']),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
