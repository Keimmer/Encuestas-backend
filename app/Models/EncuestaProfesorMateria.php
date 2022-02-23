<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaProfesorMateria extends Model
{
    protected $fillable = [
        'titulo',
        'profesor_materia_id'
    ];

    public $timestamps = false;
    use HasFactory;
}
