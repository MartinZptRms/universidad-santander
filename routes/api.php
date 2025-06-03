<?php

use App\Http\Controllers\API\AlumnoController;
use Illuminate\Support\Facades\Route;


Route::post('alumnos', [AlumnoController::class, 'store']); //creacion
Route::get('alumnos', [AlumnoController::class, 'index']); //index
Route::get('alumnos/{matricula}', [AlumnoController::class, 'show']); //consulta por matricula