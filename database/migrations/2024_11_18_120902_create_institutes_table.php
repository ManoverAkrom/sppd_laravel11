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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('tahun_ajaran')->nullable();
            $table->string('npsn')->nullable();
            $table->string('name');
            $table->enum('status', ['Negeri', 'Swasta'])->default('Negeri');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('master_name');
            $table->string('master_nip');
            $table->string('logo')->nullable();
            $table->string('letterhead')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
