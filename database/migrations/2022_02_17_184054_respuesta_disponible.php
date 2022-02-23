<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RespuestaDisponible extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('respuestas_disponibles', function (Blueprint $table) {
            $table->id();
            $table->string('respuesta');
            $table->integer('valor');
        });

        DB::table('respuestas_disponibles')->insert([
            [
                'respuesta' => 'malo',
                'valor' => 1                
            ],
            
            [
                'respuesta' => 'deficiente',
                'valor' => 2                
            ],
            
            [
                'respuesta' => 'regular',
                'valor' => 3
            ],
            
            [
                'respuesta' => 'normal',
                'valor' => 4       
            ],
            
            [
                'respuesta' => 'bueno',
                'valor' => 5                
            ],
            
            [
                'respuesta' => 'excelente',
                'valor' => 6   
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
