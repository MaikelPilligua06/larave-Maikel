
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('Peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('pais');
            $table->integer('anoEstreno');
            $table->integer('numeroDeNominacionesOscar');
            $table->integer('numeroOscars');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
