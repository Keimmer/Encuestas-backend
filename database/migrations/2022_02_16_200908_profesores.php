<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profesores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('cod_profesor_eddo');
        });

        DB::table('profesores')->insert([
            [
                'nombres' => 'Gerardo Jesús',
                'apellidos' => 'Milian Zerpa',
                'cod_profesor_eddo' => '215'
            ],
            [
                'nombres' => 'Maite Carolina',
                'apellidos' => 'Soto Yáñes',
                'cod_profesor_eddo' => '374'
            ],
            [
                'nombres' => 'Beatriz Amaralis',
                'apellidos' => 'Bautista Sánchez',
                'cod_profesor_eddo' => '375'
            ],
            [
                'nombres' => 'Leoncio Edilberto',
                'apellidos' => 'Cuenca Espinoza',
                'cod_profesor_eddo' => '376'
            ],
            [
                'nombres' => 'Laura Cecilia',
                'apellidos' => 'Omaña Ecarri',
                'cod_profesor_eddo' => '377'
            ],
            [
                'nombres' => 'Jesús Manuel',
                'apellidos' => 'Oliveros Márquez',
                'cod_profesor_eddo' => '378'
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
