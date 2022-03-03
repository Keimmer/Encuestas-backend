<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfesoresMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profesores_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->foreign('profesor_id')
                  ->references('id')
                  ->on('profesores')->onDelete('cascade');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')
                  ->references('id')
                  ->on('materias')->onDelete('cascade');
        });

        DB::table('profesores_materias')->insert([
            [
                'profesor_id' => 1,
                'materia_id' => 1
            ],
            [
                'profesor_id' => 2,
                'materia_id' => 2
            ],
            [
                'profesor_id' => 3,
                'materia_id' => 3
            ],
            [
                'profesor_id' => 4,
                'materia_id' => 10
            ],
            [
                'profesor_id' => 5,
                'materia_id' => 9
            ],
            [
                'profesor_id' => 6,
                'materia_id' => 8
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
