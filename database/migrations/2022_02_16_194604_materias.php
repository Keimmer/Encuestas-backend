<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_materia');
            $table->string('codigo');
            $table->unsignedBigInteger('mencion_id')->unsigned();
            $table->integer('year');

            $table->foreign('mencion_id')->references('id')->on('menciones')->onDelete('cascade');
        });

        DB::table('materias')->insert([
            [
                'nombre_materia' => 'Derecho Civil V',
                'codigo' => '286',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Derecho Colectivo del Trabajo y de la Seguridad Social',
                'codigo' => '287',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Derecho Mercantil II',
                'codigo' => '80',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Derecho Procesal Civil III',
                'codigo' => '81',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Derecho Procesal Penal',
                'codigo' => '82',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Derecho Tributario',
                'codigo' => '83',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Etica y Ejercicio Profesional',
                'codigo' => '84',
                'mencion_id' => 1,
                'year' => 5,
            ],
            [
                'nombre_materia' => 'Lenguaje y Comunicación',
                'codigo' => '85',
                'mencion_id' => 2,
                'year' => 1,
            ],
            [
                'nombre_materia' => 'Inglés (Partes del habla)',
                'codigo' => '86',
                'mencion_id' => 2,
                'year' => 1,
            ],
            [
                'nombre_materia' => 'Fundamentos de Derecho',
                'codigo' => '86',
                'mencion_id' => 2,
                'year' => 1,
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
