<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RespuestasEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('respuestas_estudiante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('encuesta_estudiante_id');
            $table->foreign('encuesta_estudiante_id')
                  ->references('id')
                  ->on('encuesta_estudiante')->onDelete('cascade');
            $table->unsignedBigInteger('respuesta_pregunta_id');
            $table->foreign('respuesta_pregunta_id')
                  ->references('id')
                  ->on('respuestas_pregunta_encuesta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
