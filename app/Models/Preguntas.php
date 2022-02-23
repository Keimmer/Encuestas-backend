<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    protected $fillable = ['titulo'];

    public $timestamps = false;

    use HasFactory;
}
