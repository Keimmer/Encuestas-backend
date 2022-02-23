<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class EstudiantesMaterias extends Pivot
{
    protected $table = 'estudiantes_materias';

    protected $fillable = [
        'estudiante_id',
        'materia_id'
    ];

    public $timestamps = false;

    use HasFactory;
}
