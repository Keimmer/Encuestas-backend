<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncuestaProfesorMateria;
use App\Models\PreguntasEncuesta;
use App\Models\Preguntas;
use App\Models\RespuestasPreguntasEncuesta;
use App\Models\RespuestasDisponibles;
use Illuminate\Support\Facades\Log;

class EncuestasController extends Controller
{
    //
    public function GetEncuesta($id) {
        return EncuestaProfesorMateria::where('id', '=', $id)->get();
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

    public function CreateEncuesta(Request $data) {
        //creando la encuesta obtenemos el id de la encuesta creada
        $encuesta_id = EncuestaProfesorMateria::create([
            'titulo' => $data->title,
            'profesor_materia_id' => $data->profesor_materia
        ])->id;
        //creando las preguntas
        foreach ($data->newQuestions as $question){
            Log::alert($question);
            $pregunta_id = Preguntas::firstOrCreate([
                'titulo' => $question['title']
            ])->id;
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
        return response('Encuesta Guardada con Exito!', 200);
    }
}
