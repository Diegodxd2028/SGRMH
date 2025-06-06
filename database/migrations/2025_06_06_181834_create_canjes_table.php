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
        Schema::create('canjes', function (Blueprint $table) {
            // Primary key
            $table->id('CODCanje');
            
            // Foreign keys
            $table->integer('DNI_usuario');
            $table->foreign('DNI_usuario')
                  ->references('DNI')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->unsignedBigInteger('CodRecom');
            $table->foreign('CodRecom')
                  ->references('CodRecom')
                  ->on('recompensas')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            
            // Datos del canje
            $table->integer('PuntosUtilizados')->unsigned();
            $table->integer('Cantidad')->unsigned()->default(1);
            $table->timestamp('FechaCanje')->useCurrent();
            
            // Auditoría
            $table->timestamps();
            
            // Index para mejor performance
            $table->index('DNI_usuario');
            $table->index('CodRecom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canjes');
    }
};