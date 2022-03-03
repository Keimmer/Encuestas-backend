<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_mencion');
        });

        DB::table('menciones')->insert([
            [
                'nombre_mencion' => 'Derecho'
            ],
            [
                'nombre_mencion' => 'TSU en Ciencias Penales y Criminalística'
            ],
            ]);
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
