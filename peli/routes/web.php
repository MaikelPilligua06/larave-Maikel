<?php

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ActoresController;
use Illuminate\Support\Facades\Route;

//Pelicula
Route::get('peliculas', [PeliculaController::class, 'index']);
//Actores
Route::get('actores', [ActoresController::class, 'index']);
Route::get('/actores/eliminar/{id}', [ActoresController::class, 'destroy']);
Route::get('/actores/crear', [ActoresController::class, 'create']);
Route::post('/actores/crear', [ActoresController::class, 'store']);
Route::get('/pelicula/peliculaxactor', [PeliculaController::class, 'peliculaxactor']);
Route::get('/actores/actorxpelicula', [ActoresController::class, 'actorxpelicula']);
// Aquesta ruta serveix per MOSTRAR el formulari
Route::get('/peliculas/crear', [PeliculaController::class, 'create']);

// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/peliculas/crear', [PeliculaController::class, 'store']);
// Ruta para detalles peliculas
Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);
// Ruta para eliminar pelicula
Route::get('/peliculas/eliminar/{id}', [PeliculaController::class, 'destroy']);
// Ruta para editar peliculas
Route::get('/peliculas/{id}/editar', [PeliculaController::class, 'edit']);
//Ruta para actualizar las peliculs
Route::post('/peliculas/{id}/editar', [PeliculaController::class, 'update']);


