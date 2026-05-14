<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()->json(Categories::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:255'
        ]);
        $categoria = Categories::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categories::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function update(Request $request, $id)
    {
        // Buscar y comprobar que existe
        $categoria = Categories::find($id);
        // Validar datos
        $request->validate([
            'categoria' => 'required|string|max:255'
        ]);
        // Actualizar datos
        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        $categoria = Categories::find($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria no encontrada'], 200);
    }
}
