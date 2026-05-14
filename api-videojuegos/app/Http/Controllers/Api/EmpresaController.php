<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index() {
        return response()->json(Empresa::all(), 200);
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nacionalitat' => 'required|string|max:255'
        ]);
        $developers = Empresa::create($request->all());
        return response()->json($developers, 201);
    }

    public function show($id) {
        $developers = Empresa::find($id);
        if (!$developers) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }
        return response()->json($developers, 200);
    }

    public function update(Request $request, $id) {
        // Buscar y comprobar que existe
        $developers = Empresa::find($id);
        // Validar datos
        $request->validate([
            'nom' => 'required|string|max:255',
            'nacionalitat' => 'required|string|max:255',
        ]);
        // Actualizar datos
        $developers->update($request->all());
        return response()->json($developers, 200);
    }

    public function destroy($id) {
        $developers = Empresa::find($id);
        $developers->delete();
        return response()->json(['message' => 'Empresa no encontrada'], 200);
    }
}
