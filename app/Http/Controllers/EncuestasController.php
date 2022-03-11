<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncuestaProfesorMateria;
use App\Models\PreguntasEncuesta;
use App\Models\Preguntas;
use App\Models\RespuestasPreguntasEncuesta;
use App\Models\RespuestasDisponibles;
use App\Models\RespuestasEstudiante;
use App\Models\EncuestaEstudiante;
use App\Models\EstudiantesMaterias;
use App\Models\Materias;
use Illuminate\Support\Facades\Log;

class EncuestasController extends Controller
{
    //
    public function GetEncuesta($id) {
        return EncuestaProfesorMateria::where('id', '=', $id)->get();
    }

    public function GetEncuestaYPreguntas($id) {
        $encuesta = EncuestaProfesorMateria::where('encuesta_profesor_materias.id', '=', $id)
        ->join('profesores_materias', 'profesores_materias.id','=', 'encuesta_profesor_materias.profesor_materia_id')
        ->join('materias', 'profesores_materias.materia_id', '=', 'materias.id')
        ->join('profesores', 'profesores.id', '=', 'profesores_materias.profesor_id') 
        ->select('encuesta_profesor_materias.id as id', 'profesores.nombres', 'profesores.apellidos', 'nombre_materia')
        ->get();
        
        $encuesta['preguntas'] = PreguntasEncuesta::where('preguntas_encuesta.encuesta_id', '=', $id)
            ->join('preguntas', 'preguntas.id', '=', 'preguntas_encuesta.pregunta_id')->get();
            foreach($encuesta['preguntas'] as $pregunta){
                $pregunta['respuestas'] = RespuestasPreguntasEncuesta::where('respuestas_pregunta_encuesta.pregunta_id', '=', $pregunta->id)
                ->join('respuestas_disponibles', 'respuestas_pregunta_encuesta.resp_disp_id', '=', 'respuestas_disponibles.id')->get();
            }
        return $encuesta;
    }

    public function GetPreguntasRespuestasEncuesta($id) {
        $encuestas = EncuestaProfesorMateria::where('encuesta_profesor_materias.id', '=', $id)->get();
        foreach($encuestas as $encuesta){
            $encuesta['preguntas'] = PreguntasEncuesta::where('preguntas_encuesta.encuesta_id', '=', $encuesta->id)
            ->join('preguntas', 'preguntas.id', '=', 'preguntas_encuesta.pregunta_id')->get();
            foreach($encuesta['preguntas'] as $pregunta){
                $pregunta['respuestas'] = RespuestasPreguntasEncuesta::where('respuestas_pregunta_encuesta.pregunta_id', '=', $pregunta->id)
                ->join('respuestas_disponibles', 'respuestas_pregunta_encuesta.resp_disp_id', '=', 'respuestas_disponibles.id')->get();
            }
        }
        return $encuestas;
    }

    //funcion para obtener todos los estudiantes que cursan la materia de un profesor indicado
    public function GetStudents ($profesor) {
        $estudiantes_materias = EstudiantesMaterias::
            join('materias', 'estudiantes_materias.materia_id', '=', 'materias.id')
            ->join('profesores_materias', 'materias.id', '=', 'profesores_materias.materia_id')
            ->where('profesores_materias.profesor_id', '=', $profesor->profid)
            ->select('estudiantes_materias.estudiante_id')
            ->get();
        return $estudiantes_materias;
    }

    public function CreateEncuesta(Request $data) {
        //seleccionamos los profesores de las materias de la mencion seleccionada
        $profesores_materias = Materias::where('mencion_id', '=', $data->mencion_id)
            ->join('profesores_materias', 'materias.id', '=', 'profesores_materias.materia_id')
            ->select('profesores_materias.id', 'profesores_materias.profesor_id as profid')
            ->get();
        
        foreach ($profesores_materias as $profesor) {
            //creando la encuesta obtenemos el id de la encuesta creada
            $encuesta_id = EncuestaProfesorMateria::create([
                'profesor_materia_id' => $profesor->id
            ])->id;
            
            //obtenemos todos los estudiantes de este profesor
            $estudiantes = $this->GetStudents($profesor);

            //asignando la encuesta a todos los estudiantes del profesor actual
            foreach ($estudiantes as $estudiante) {
                EncuestaEstudiante::create([
                    'estudiante_id' => $estudiante->estudiante_id,
                    'encuesta_id' => $encuesta_id
                ]);
            }
            //creando las preguntas
            foreach ($data->newQuestions as $question) {
                $pregunta_id = Preguntas::firstOrCreate([
                    'titulo' => $question['title']
                ])->id;//se busca una pregunta o se crea si no existe y se asigna a la encuesta creada
                $pregunta_encuesta_id = PreguntasEncuesta::create([
                    'pregunta_id' => $pregunta_id,
                    'encuesta_id' => $encuesta_id
                ])->id;
                foreach ($question['options'] as $respuesta) {
                    $resp_id = RespuestasDisponibles::firstOrCreate([
                        'respuesta' => $respuesta['nombre'],
                        'valor' => $respuesta['valor']
                    ])->id;
                    RespuestasPreguntasEncuesta::firstOrCreate([
                        'pregunta_id' => $pregunta_encuesta_id,
                        'resp_disp_id' => $resp_id
                    ]);
                }
                
            }
        }
        return response('Encuesta Guardada con Exito!', 200);
    }

    public function GuardarRespuestasEstudiante(Request $data) {
        Log::info($data);
        $encuestaEstudiante = EncuestaEstudiante::where('estudiante_id', $data['estudiante']['id'])
        ->where('encuesta_id', $data['encuesta'][0]['id'])->first();
        $encuestaEstudiante->update(['respondida' => true]);
        foreach ($data['encuesta']['preguntas'] as $pregunta) {
            $respuestaPreguntaId = RespuestasPreguntasEncuesta::
                                        where('pregunta_id', $pregunta['respuestas'][0]['pregunta_id'])
                                        ->where('resp_disp_id', $pregunta['respuestas'][0]['resp_disp_id'])
                                        ->select('id')->first();
            RespuestasEstudiante::create([
                'encuesta_estudiante_id' => $encuestaEstudiante->id,
                'respuesta_pregunta_id'=> $respuestaPreguntaId['id']
            ]);
        }
    }
}
