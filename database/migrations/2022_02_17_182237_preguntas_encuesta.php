<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PreguntasEncuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('preguntas_encuesta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')
                  ->references('id')
                  ->on('preguntas')->onDelete('cascade');
            $table->unsignedBigInteger('encuesta_id');
            $table->foreign('encuesta_id')
                  ->references('id')
                  ->on('encuesta_profesor_materias')->onDelete('cascade');
        });

        DB::table('preguntas_encuesta')->insert([
            [
                'pregunta_id' => 1,
                'encuesta_id' => 1,
            ],
            
            [
                'pregunta_id' => 2,
                'encuesta_id' => 1,
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
