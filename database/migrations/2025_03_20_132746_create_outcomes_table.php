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
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sppd_id')->constrained('posts')->onDelete('cascade');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_biayas')->onDelete('cascade');
            $table->string('komponen')->nullable();
            $table->decimal('biaya', 10, 2)->nullable();
            // $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};
