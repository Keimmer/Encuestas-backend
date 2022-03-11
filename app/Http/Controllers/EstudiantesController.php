<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\EncuestaEstudiante;
use App\Models\EstudiantesMaterias;
use App\Models\EncuestaProfesorMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetEncuestasDisponibles($cedula)
    {
        //

        $estudiante = Estudiantes::where('estudiantes.cedula', '=', $cedula)
            ->get();
        Log::alert($estudiante);

        $estudiante['encuestas'] = EncuestaEstudiante::
            where('encuesta_estudiante.estudiante_id', '=', $estudiante[0]->id)
            ->join('encuesta_profesor_materias', 'encuesta_estudiante.encuesta_id', '=', 'encuesta_profesor_materias.id')
            ->get();
        foreach($estudiante['encuestas'] as $encuesta) {
            $encuesta['profesor'] = EncuestaProfesorMateria::
                where('encuesta_profesor_materias.id', '=', $encuesta->id)
                ->join('profesores_materias', 'encuesta_profesor_materias.profesor_materia_id', '=', 'profesores_materias.id')
                ->join('materias', 'profesores_materias.materia_id', '=', 'materias.id')
                ->join('profesores', 'profesores_materias.profesor_id', '=', 'profesores.id')
                ->select('nombres', 'apellidos', 'nombre_materia')
                ->get();
        }
        return $estudiante;
    }
    
    public function getEstudianteMateriasYProfesores($cedula)
    {
        //

        return Estudiantes::join('estudiantes_materias', 'estudiantes_materias.estudiante_id', '=', 'estudiantes.id')
        ->join('materias', 'estudiantes_materias.materia_id', '=', 'materias.id')
        ->join('profesores_materias', 'estudiantes_materias.materia_id', '=', 'profesores_materias.materia_id')
        ->join('profesores', 'profesores_materias.profesor_id', '=', 'profesores.id')
        ->where('estudiantes.cedula', '=', $cedula)
        ->select('estudiantes.nombres', 'estudiantes.apellidos', 'materias.nombre_materia', 'profesores.nombres as prof')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
