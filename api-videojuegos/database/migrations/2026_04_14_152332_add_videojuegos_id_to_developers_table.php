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
        Schema::table('videojuegos', function (Blueprint $table) {
            // Creem la clau estrangera que apunta a la taula autors
            $table->foreignId('empresas_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videojuegos', function (Blueprint $table) {
            //
        });
    }
};
