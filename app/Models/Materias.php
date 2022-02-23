<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre_mat',
    ];

    public function mencion()
    {
        return $this->belongsTo(Mencion::class);
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}
