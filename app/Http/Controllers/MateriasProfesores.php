<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;

class MateriasProfesores extends Controller
{
    //
    public function GetMaterias(){
        return Materias::
            join('profesores_materias', 'profesores_materias.materia_id', '=', 'materias.id')
            ->join('profesores', 'profesores_materias.profesor_id', '=', 'profesores.id')
            ->get();
    }
}
