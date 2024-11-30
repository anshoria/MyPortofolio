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
        Schema::create('typing_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('timeleft');
            $table->integer('wpm');
            $table->integer('accuracy');
            $table->integer('avg_score');
            $table->enum('language', ['en', 'id']); // Menambahkan kolom language
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typing_tests');
    }
};
