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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description'); //string to text
            $table->string('category');
            $table->string('url')->nullable();
            $table->string('image');
            $table->string('year');
            $table->boolean('is_featured')->default(false); //penambahan
            $table->boolean('is_catalog')->default(false); //penambahan
            $table->integer('price')->nullable(); //penambahan
            $table->string('catalog_img')->nullable(); //penambahan
            $table->string('tech_stack'); //penambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
