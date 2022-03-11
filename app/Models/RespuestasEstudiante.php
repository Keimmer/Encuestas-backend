<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestasEstudiante extends Model
{
    protected $table = 'respuestas_estudiante';

    protected $fillable = [
        'encuesta_estudiante_id',
        'respuesta_pregunta_id'
    ];

    public $timestamps = false;

    use HasFactory;
}
