<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videojuegos;
use Illuminate\Http\Request;

class VideojuegosController extends Controller
{
    public function index(Request $request) {
        $query = Videojuegos::with(['developers', 'categorias']);
        if ($request->filled('titol')) {
            $query->where('titol', 'like', '%' . $request->titol . '%');
        }
        if ($request->filled('min_pagines')) {
            $query->where('pagines', '>=', $request->min_pagines);
        }
        if ($request->filled('camps')) {
            $camps = explode(',', $request->camps);
            $query->select($camps);
        }
        $sortField = $request->get('ordenar_per', 'id');
        $sortOrder = $request->get('ordre', 'asc');
        $query->orderBy($sortField, $sortOrder);
        return response()->json($query->get(), 200);
    }
    public function recents() {
        $videojocs = Videojuegos::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return response()->json($videojocs, 200);
    }

    public function llargs() {
        $llibres = Videojuegos::orderBy('pagines', 'desc')->take(10)->get();
        return response()->json($llibres);
    }
    public function store(Request $request) {
        $request->validate([
            'titol' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|string|max:255',
            'precio' => 'required|decimal:2',
            'pagines' => 'required|integer',
            'developers_id' => 'nullable'
        ]);
        $juego = Videojuegos::create($request->all());
        return response()->json($juego, 201);
    }

    public function show($id) {
        $juego = Videojuegos::find($id);
        if (!$juego) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }
        return response()->json($juego, 200);
    }

    public function update(Request $request, $id) {
        // Buscar y comprobar que existe
        $videojuegos = Videojuegos::find($id);
        // Validar datos
        $request->validate([
            'titol' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|string|max:255',
            'precio' => 'required|decimal:2',
            'pagines' => 'required|integer',
            'developers_id' => 'nullable'
        ]);
        // Actualizar datos
        $videojuegos->update($request->all());
        return response()->json($videojuegos, 200);
    }

    public function destroy($id) {
        $videojuegos = Videojuegos::find($id);
        $videojuegos->delete();
        return response()->json(['message' => 'Juego no encontrado'], 200);
    }
    public function assignarAutor(Request $request, $id) {
        $videojuegos = Videojuegos::find($id);
        if (!$videojuegos) return response()->json(['message' => 'Videojuego no trobat'], 404);
        $request->validate(['developers_id' => 'required|exists:empresas,id']);
        $videojuegos->developers_id = $request->developers_id;
        $videojuegos->save();
        return response()->json([
            'message' => 'Developer assignat correctament',
            'videojuegos' => $videojuegos->load('developers')
        ], 200);
    }
    public function assignarCategorias(Request $request, $id) {
        // Recuperem el llibre amb l’identificador
        $videojuegos = Videojuegos::find($id);
        // Si no existeix, retornem un missatge d’error
        if (!$videojuegos) return response()->json(['message' => 'Videojuego no trobat'], 404);
        // Validem que ens arribi un array d'IDs de categories que existeixin
        $request->validate([
            'categoria' => 'required|array',
            'categoria.*' => 'exists:categories,id'
        ]);
        $videojuegos->categories()->sync($request->categoria);

        return response()->json([
            'message' => 'Categories actualitzades',
            'videojuegos' => $videojuegos->load('categories')
        ]);
    }
}
