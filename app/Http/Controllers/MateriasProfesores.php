<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Mencion;

class MateriasProfesores extends Controller
{
    //
    public function GetMaterias($id, $year){
        return Materias::
            join('profesores_materias', 'profesores_materias.materia_id', '=', 'materias.id')
            ->join('profesores', 'profesores_materias.profesor_id', '=', 'profesores.id')
            ->where('materias.mencion_id', '=', $id)
            ->where('materias.year', '=', $year)
            ->get();
    }
    //funcion para obtener cuantos años dura la mencion solicitada
    public function GetMencionYears($mencion) {
        return Materias::where('mencion_id', '=', $mencion)->select('id', 'year')->groupBy('year')->get();
    }

    public function GetMenciones() {
        return Mencion::get();
    }
}
