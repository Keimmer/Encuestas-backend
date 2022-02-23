<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncuestaProfesorMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('encuesta_profesor_materias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('profesor_materia_id');
            $table->foreign('profesor_materia_id')
                  ->references('id')
                  ->on('profesores_materias')->onDelete('cascade');
        });

        DB::table('encuesta_profesor_materias')->insert([
            [
                'titulo' => 'encuesta para promediar el desempeño del profesor',
                'profesor_materia_id' => 1
            ],
            [
                'titulo' => 'encuesta para medir el desempeño del profesor',
                'profesor_materia_id' => 2
            ],
            ]
        );

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
