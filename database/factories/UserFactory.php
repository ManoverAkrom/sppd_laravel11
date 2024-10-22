<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => $this->faker->dateTimeThisMonth(),
            'password' => static::$password ??= Hash::make('password'),
            'nip' => mt_rand(198911052025021001,200011052025021001),
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }

    public function manover(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Manover',
            'username' => 'manover',
            'role' => 'admin',
            'email' => 'manover@mail.id',
            'email_verified_at' => $this->faker->dateTimeThisMonth(),
            'password' => '1234',
            'nip' => '199711052025021001',
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ]);
    }
}
