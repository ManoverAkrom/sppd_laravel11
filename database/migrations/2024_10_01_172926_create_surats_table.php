<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('category_id');
            // $table->foreignId('user_id');

            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'surats_user_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories', indexName: 'surats_category_id'
            );

            $table->string('slug')->unique();
            $table->string('no_spt')->nullable();
            $table->date('tgl_spt')->nullable();
            // Dasar Perjalanan Dinas
            $table->string('sumber')->nullable();
            $table->string('instansi')->nullable();
            $table->string('no_surat_sumber')->nullable();
            $table->date('tgl_surat_sumber')->nullable();
            $table->text('hal_surat_sumber')->nullable();
            $table->string('file')->nullable();
            // Data Perjalanan Dinas
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('pengikut')->nullable();
            $table->string('tempat_berjalan')->nullable();
            $table->string('tempat_tujuan')->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->integer('lama')->default(1);
            $table->time('jam_berangkat')->default('08:00:00');
            $table->string('maksud')->nullable();
            $table->string('keterangan')->nullable();

            $table->enum('status', ['ditinjau', 'disetujui', 'ditolak'])->default('ditinjau');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
