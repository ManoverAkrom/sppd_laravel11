<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institute>
 */
class InstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => 'smkn-negeri-1-kalikajar',
            'tahun_ajaran' => '2024/2025',
            'npsn' => '69945063',
            'name' => 'SMK Negeri 1 Kalikajar',
            'status' => 'Negeri',
            'email' => fake()->unique()->safeEmail(),
            'master_name' => 'Drs. Rohmat Istiyadi',
            'master_nip' => '196710291991031007',
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
