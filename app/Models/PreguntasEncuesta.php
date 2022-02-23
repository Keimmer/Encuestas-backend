<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntasEncuesta extends Model
{
    protected $table = 'preguntas_encuesta';

    protected $fillable = [
        'pregunta_id',
        'encuesta_id'
    ];

    public $timestamps = false;

    use HasFactory;
}
