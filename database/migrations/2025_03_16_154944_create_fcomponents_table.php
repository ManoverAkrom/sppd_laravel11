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
        Schema::create('fcomponents', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('finance_category_id')->constrained(
            //     table: 'finance_categories', indexName: 'finance_category_id'
            // );
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fcomponents');
    }
};
