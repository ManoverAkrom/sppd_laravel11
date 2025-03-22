<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'no_spt' => '094/' . mt_rand(100, 345),
            'tgl_spt' => $this->faker->date(),
            'sumber' => $this->faker->randomElement(['Nota Dinas', 'Surat Edaran', 'Perintah Kepala Sekolah']),
            'instansi' => $this->faker->randomElement(['Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah', 'Cabang Dinas Pendidikan Wilayah IX Provinsi Jawa Tengah', 'SMK Negeri 1 Kalikajar', 'Diskominfo Kabupaten Wonosobo']),
            'no_surat_sumber' => $this->faker->randomElement(['800/', '900/', '821/', '005/']) . mt_rand(423, 2254),
            'tgl_surat_sumber' => $this->faker->date(),
            'hal_surat_sumber' => $this->faker->sentence(mt_rand(4, 10)),
            // 'author_id', 'name_id', 'follower_id' => User::factory(),
            'author_id' => User::factory(),
            'name_id' => User::factory(),
            'follower_id' => User::factory(),
            'category_id' => Category::factory(),
            'tempat_tujuan' => $this->faker->city(),
            'tempat_berjalan' => fake()->randomElement(['Darat', 'Udara', 'Laut', 'Darat-Udara', 'Darat-Laut', 'Udara-Laut', 'Darat-Udara-Laut']),
            'tgl_berangkat' => fake()->date(),
            'tgl_kembali' => fake()->date,
            'lama' => mt_rand(1, 3),
            'jam_berangkat' => fake()->time('H:i'),
            'maksud' => $this->faker->sentence(mt_rand(3, 8)),
            'keterangan' => $this->faker->paragraph(),
            'status' => fake()->randomElement(['diajukan', 'ditolak']),


            'created_at' => $this->faker->dateTimeBetween('-4 years', 'now'),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
