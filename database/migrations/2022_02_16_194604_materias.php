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

            $table->foreign('mencion_id')->references('id')->on('menciones')->onDelete('cascade');
        });

        DB::table('materias')->insert([
            [
                'nombre_materia' => 'Derecho Civil V',
                'codigo' => '286',
                'mencion_id' => 1,
            ],
            
            [
                'nombre_materia' => 'Derecho Colectivo del Trabajo y de la Seguridad Social',
                'codigo' => '287',
                'mencion_id' => 1,
            ]]

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
