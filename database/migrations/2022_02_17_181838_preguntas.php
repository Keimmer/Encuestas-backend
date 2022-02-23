<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Preguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
        });

        DB::table('preguntas')->insert([
            [
                'titulo' => 'como calificaria el comportamiento del profesor/a',
            ],
            [
                'titulo' => 'como calificaria el uso de los medios digitales para impartir clases?',                
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
