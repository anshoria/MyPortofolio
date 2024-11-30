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
        Schema::create('aboutpages', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('description');
            // stats
            $table->string('experience');
            $table->string('projects');
            $table->string('satisfaction');
            $table->string('support');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpages');
    }
};
