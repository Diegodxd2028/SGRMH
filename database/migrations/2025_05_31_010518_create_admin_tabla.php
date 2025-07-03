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
        Schema::create('clientes_tabla', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
    $table->integer('DNI')->primary();
    $table->string('Nombres');
    $table->string('Apellido_paterno');
    $table->string('Apellido_materno', 50);
    $table->integer('telefono')->unique();
    $table->string('Correo_electronico', 50)->unique();
    $table->string('Contraseña', 100);
    $table->timestamp('Fecha_creacion')->useCurrent();
});
    }
};
