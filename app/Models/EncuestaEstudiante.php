<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaEstudiante extends Model
{
    protected $table = 'encuesta_estudiante';

    protected $fillable = [
        'estudiante_id',
        'encuesta_id'
    ];

    public $timestamps = false;
    
    use HasFactory;
}
