<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Component>
 */
class TravelComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_category_id' => fake()->numberBetween(1,4),
            'name' => fake()->word(),
            'amount' => fake()->numberBetween(30000, 250000),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
