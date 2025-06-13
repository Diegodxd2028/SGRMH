<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanjesTable extends Migration
{
    public function up()
    {
        Schema::create('canjes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DNI_usuario'); // ← CAMBIO CLAVE: ahora es unsignedBigInteger
            $table->unsignedBigInteger('CodRecom');    // ← Asegúrate que CodRecom es la PK en recompensas
            $table->integer('PuntosUtilizados');
            $table->integer('Cantidad');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('DNI_usuario')->references('DNI')->on('users')->onDelete('cascade');
            $table->foreign('CodRecom')->references('CodRecom')->on('recompensas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('canjes');
    }
}
