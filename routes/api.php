<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\MateriasProfesores;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//estudiantes
Route::get('/estudiantes/{cedula}/encuestas', [EstudiantesController::class, 'GetEncuestasDisponibles']);
Route::get('/estudiante/{cedula}', [EstudiantesController::class, 'getEstudianteMateriasYProfesores']);
//encuestas
Route::get('/encuesta/{id}', [EncuestasController::class, 'GetPreguntasRespuestasEncuesta']);
//materias y profesores
Route::get('/materias', [MateriasProfesores::class, 'GetMaterias']);

Route::post('/encuesta/new', [EncuestasController::class, 'CreateEncuesta']);
