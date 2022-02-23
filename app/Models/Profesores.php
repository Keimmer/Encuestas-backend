<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula'
    ];

    public function materias()
    {
        return $this->belongsToMany(Materias::class)->using(ProfMaterias::class);
    }

    use HasFactory;
}
