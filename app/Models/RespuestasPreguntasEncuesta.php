<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestasPreguntasEncuesta extends Model
{
    protected $table = 'respuestas_pregunta_encuesta';

    protected $fillable = [
        'pregunta_id',
        'resp_disp_id'
    ];

    public $timestamps = false;

    use HasFactory;
}
