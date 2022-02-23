<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestasDisponibles extends Model
{
    protected $table = 'respuestas_disponibles';

    protected $fillable = [
        'respuesta', 
        'valor'
    ];

    public $timestamps = false;
    
    use HasFactory;
}
