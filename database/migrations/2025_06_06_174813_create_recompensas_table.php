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
        Schema::create('recompensas', function (Blueprint $table) {
            $table->id('CodRecom'); // Primary key autoincremental
            $table->string('Titulo', 100);
            $table->text('Descripcion');
            $table->integer('PuntosNecesarios')->unsigned(); // Entero sin signo (no negativo)
            $table->boolean('EsTemporal')->default(false); // Booleano (false por defecto)
            $table->date('FechaInicio')->nullable(); // Obligatorio solo si EsTemporal=true
            $table->date('FechaFin')->nullable();      // Obligatorio solo si EsTemporal=true
            $table->integer('Stock')->default(1);     // Stock con valor mínimo 1
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recompensas');
    }
};