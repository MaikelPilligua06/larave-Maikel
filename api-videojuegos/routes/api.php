<?php

use App\Http\Controllers\Api\VideojuegosController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PersonajesController;
use Illuminate\Support\Facades\Route;

// Llistar tots
Route::get('/videojuegos', [VideojuegosController::class, 'index']);

// Obtenir-ne un de sol
Route::get('/videojuegos/{id}', [VideojuegosController::class, 'show']);

// Crear-ne un de nou
Route::post('/videojuegos', [VideojuegosController::class, 'store']);

// Actualitzar un existent
Route::put('/videojuegos/{id}', [VideojuegosController::class, 'update']);

// Eliminar un registre
Route::delete('/videojuegos/{id}', [VideojuegosController::class, 'destroy']);

Route::patch('/videojuegos/{id}/assignar-empresa', [VideojuegosController::class, 'assignarAutor']);
// Ruta per assignar categories a un llibre
Route::post('/videojuegos/{id}/categorias', [VideojuegosController::class, 'assignarCategorias']);

Route::get('/videojuegos/llargs', [VideojuegosController::class, 'llargs']);

Route::get('/games/recents', [VideojuegosController::class, 'recents']);


// Llistar tots
Route::get('/empresa', [EmpresaController::class, 'index']);

// Obtenir-ne un de sol
Route::get('/empresa/{id}', [EmpresaController::class, 'show']);

// Crear-ne un de nou
Route::post('/empresa', [EmpresaController::class, 'store']);

// Actualitzar un existent
Route::put('/empresa/{id}', [EmpresaController::class, 'update']);

// Eliminar un registre
Route::delete('/empresa/{id}', [EmpresaController::class, 'destroy']);













// Categorias

// Llistar tots
Route::get('/categorias', [CategoriesController::class, 'index']);

// Obtenir-ne un de sol
Route::get('/categorias/{id}', [CategoriesController::class, 'show']);

// Crear-ne un de nou
Route::post('/categorias', [CategoriesController::class, 'store']);

// Actualitzar un existent
Route::put('/categorias/{id}', [CategoriesController::class, 'update']);

// Eliminar un registre
Route::delete('/categorias/{id}', [CategoriesController::class, 'destroy']);

Route::patch('/categorias/{id}/assignar-empresa', [CategoriesController::class, 'assignarAutor']);




// Llistar tots
Route::get('/personajes', [PersonajesController::class, 'index']);

// Obtenir-ne un de sol
Route::get('/personajes/{id}', [PersonajesController::class, 'show']);

// Crear-ne un de nou
Route::post('/personajes', [PersonajesController::class, 'store']);

// Actualitzar un existent
Route::put('/personajes/{id}', [PersonajesController::class, 'update']);

// Eliminar un registre
Route::delete('/personajes/{id}', [PersonajesController::class, 'destroy']);

Route::PATCH('/personajes/filtro', [PersonajesController::class, 'filtroEspecie']);
