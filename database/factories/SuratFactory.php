<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
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
            'no_spt' => '094/' . mt_rand(100,345),
            'tgl_spt' => $this->faker->date(),
            'sumber' => $this->faker->randomElement(['Nota Dinas', 'Surat Edaran', 'Perintah Kepala Sekolah']),
            'instansi' => $this->faker->randomElement(['Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah', 'Cabang Dinas Pendidikan Wilayah IX Provinsi Jawa Tengah', 'SMK Negeri 1 Kalikajar', 'Diskominfo Kabupaten Wonosobo']),
            'no_surat_sumber'=> $this->faker->randomElement(['800/', '900/', '821/', '005/']) . mt_rand(423,2254),
            'tgl_surat_sumber' => $this->faker->date(),
            'hal_surat_sumber' => $this->faker->sentence(mt_rand(4,10)),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,4),
            'tempat_tujuan' => $this->faker->city(),
            'tgl_berangkat' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'tgl_kembali' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'lama' => mt_rand(1,3),
            'jam_berangkat' => $this->faker->time(),
            'maksud' => $this->faker->sentence(mt_rand(3,8)),
            'keterangan' => $this->faker->paragraph(),

            'created_at' => $this->faker->dateTimeBetween('-4 years', 'now'),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
