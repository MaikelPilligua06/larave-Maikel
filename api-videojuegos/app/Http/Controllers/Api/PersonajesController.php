<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personajes;
use App\Models\Videojuegos;
use Illuminate\Http\Request;

class PersonajesController extends Controller
{
    public function index()
    {
        return response()->json(Personajes::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'fecha_aparicion' => 'required|date'
        ]);
        $personaje = Personajes::create($request->all());
        return response()->json($personaje, 201);
    }

    public function show($id)
    {
        $personajes = Personajes::find($id);
        if (!$personajes) {
            return response()->json(['message' => 'Personaje no encontrado'], 404);
        }
        return response()->json($personajes, 200);
    }

    public function update(Request $request, $id)
    {
        // Buscar y comprobar que existe
        $personajes = Personajes::find($id);
        // Validar datos
        $request->validate([
            'nombre' => 'string|max:255',
            'especie' => 'string|max:255',
            'fecha_aparicion' => 'date'
        ]);
        // Actualizar datos
        $personajes->update($request->all());
        return response()->json($personajes, 200);
    }

    public function destroy($id)
    {
        $personajes = Personajes::find($id);
        $personajes->delete();
        return response()->json(['message' => 'Personaje no encontrado'], 200);
    }
    public function filtroEspecie(Request $request){
        $query = Personajes::orderBy('nombre');
        if ($request->filled('especie')) {
            $query->where('especie', 'like', '%' . $request->especie . '%');
        }
        if ($request->filled('camps')) {
            $camps = explode(',', $request->camps);
            $query->select($camps);
        }
        $sortField = $request->get('ordenar_per', 'nombre');
        $sortOrder = $request->get('ordre', 'asc');
        $query->orderBy($sortField, $sortOrder);
        return response()->json($query->get(), 200);
    }
}
