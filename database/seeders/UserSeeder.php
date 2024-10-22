<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => '-',
            'username' => 'no.username',
            'role' => 'user',
            'email' => 'usergaib@mail.id',
            'email_verified_at' => '1999-01-06 11:05:00',
            'password' => bcrypt('12345'),
            'nip' => '0',
            'jabatan' => '-',
            'remember_token' => Str::random(10),
            'created_at' => '1997-11-05 06:01:05',
            'updated_at' => '1999-01-06 05:11:06',
        ]);
        User::create([
            'name' => 'Manover',
            'username' => 'manover',
            'role' => 'master',
            'email' => 'manover@mail.id',
            'email_verified_at' => '1999-01-06 11:05:00',
            'password' => bcrypt('manover'),
            'nip' => '199711052025021001',
            'jabatan' => 'Tenaga Administrasi Sekolah',
            'remember_token' => Str::random(10),
            'created_at' => '1997-11-05 06:01:05',
            'updated_at' => '1999-01-06 05:11:06',
        ]);
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'role' => 'admin',
            'email' => 'admin@mail.id',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'nip' => '199711052025021005',
            'jabatan' => 'Administrator',
            'remember_token' => Str::random(10),
            'created_at' => '1997-11-05 06:01:05',
            'updated_at' => '1999-01-06 05:11:06',
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user',
            'role' => 'user',
            'email' => 'user@mail.id',
            'email_verified_at' => '1999-01-06 11:05:00',
            'password' => Hash::make('user123'),
            'nip' => '199711052025021002',
            'jabatan' => 'Guru',
            'remember_token' => Str::random(10),
            'created_at' => '1997-11-05 06:01:05',
            'updated_at' => '1999-01-06 05:11:06',
        ]);
        User::create([
            'name' => 'Bendahara',
            'username' => 'bendahara',
            'role' => 'treasurer',
            'email' => 'treasurer@mail.id',
            'email_verified_at' => '1999-01-06 11:05:00',
            'password' => Hash::make('bend123'),
            'nip' => '199711052025021003',
            'jabatan' => 'Bendahara BOS',
            'remember_token' => Str::random(10),
            'created_at' => '1997-11-05 06:01:05',
            'updated_at' => '1999-01-06 05:11:06',
        ]);

        // User::factory(5)->create();
    }
}
