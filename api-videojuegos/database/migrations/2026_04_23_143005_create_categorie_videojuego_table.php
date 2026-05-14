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
        Schema::create('categories_videojuegos', function (Blueprint $table) {
            $table->id();
            // Ambos como foreignId para que coincidan con los BIGINT de las tablas padre
            $table->foreignId('videojuegos_id')->constrained()->onDelete('cascade');
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_juego');
    }
};
