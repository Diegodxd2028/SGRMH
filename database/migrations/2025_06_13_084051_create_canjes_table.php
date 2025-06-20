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
            $table->unsignedBigInteger('DNI_usuario');
            $table->unsignedBigInteger('CodRecom');
            $table->integer('PuntosUtilizados');
            $table->integer('Cantidad');
            $table->enum('entregado', ['pendiente', 'entregado'])->default('pendiente'); 
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
