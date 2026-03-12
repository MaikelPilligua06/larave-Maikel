<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

Route::get('peliculas', [PeliculaController::class, 'index']);


// Aquesta ruta serveix per MOSTRAR el formulari
Route::get('/peliculas/crear', [PeliculaController::class, 'create']);

// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/peliculas/crear', [PeliculaController::class, 'store']);
