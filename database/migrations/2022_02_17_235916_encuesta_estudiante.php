<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncuestaEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('encuesta_estudiante', function (Blueprint $table) {
            $table->id();
            $table->boolean('respondida');
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')
                  ->references('id')
                  ->on('estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('encuesta_id');
            $table->foreign('encuesta_id')
                  ->references('id')
                  ->on('encuesta_profesor_materias')->onDelete('cascade');
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
