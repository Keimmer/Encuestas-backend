<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstudiantesMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('estudiantes_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')
                  ->references('id')
                  ->on('estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')
                  ->references('id')
                  ->on('materias')->onDelete('cascade');
        });

        DB::table('estudiantes_materias')->insert([
            [
                'estudiante_id' => 1,
                'materia_id' => 1
            ],
            [
                'estudiante_id' => 1,
                'materia_id' => 2
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
