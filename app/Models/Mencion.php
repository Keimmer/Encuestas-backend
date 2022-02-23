<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    protected $fillable = [
        'nombre_mencion',
    ];


    use HasFactory;
}
