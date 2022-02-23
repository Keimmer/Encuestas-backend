<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RespuestasPreguntaEncuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('respuestas_pregunta_encuesta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')
                ->references('id')
                ->on('preguntas_encuesta')->onDelete('cascade');
            $table->unsignedBigInteger('resp_disp_id');
            $table->foreign('resp_disp_id')
                ->references('id')
                ->on('respuestas_disponibles')->onDelete('cascade');
        });

        DB::table('respuestas_pregunta_encuesta')->insert([
            [
                'pregunta_id' => 1,
                'resp_disp_id' => 1
            ],
            
            [
                'pregunta_id' => 1,
                'resp_disp_id' => 2
            ],
            
            [
                'pregunta_id' => 1,
                'resp_disp_id' => 3
            ],
            
            [
                'pregunta_id' => 1,
                'resp_disp_id' => 4
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
