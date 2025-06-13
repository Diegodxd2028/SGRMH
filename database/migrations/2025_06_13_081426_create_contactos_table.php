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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->string('asunto');
            $table->text('mensaje');
            $table->unsignedBigInteger('DNI_usuario')->nullable(); // Clave foránea opcional
            $table->timestamps();

            // Clave foránea correctamente formada
            $table->foreign('DNI_usuario')
                  ->references('DNI')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
