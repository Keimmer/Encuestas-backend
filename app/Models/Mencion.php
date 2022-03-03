<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    protected $table = 'menciones';

    protected $fillable = [
        'nombre_mencion',
    ];

    public $timestamps = false;

    use HasFactory;
}
