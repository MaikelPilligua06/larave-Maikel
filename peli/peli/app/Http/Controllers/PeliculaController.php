<?php
namespace App\Http\Controllers;
use App\Models\Pelicula;
use App\Models\Actores;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $totesLesPelicules = pelicula::all();
        return view('pelicula.index', ['pelicula' => $totesLesPelicules]);
    }
    public function create()
    {
        $actores = \App\Models\Actores::all();
        return view('pelicula.create', compact('actores'));
    }
    public function store(\Illuminate\Http\Request $request){
        $nouPelicula = new \App\Models\Pelicula();

        $nouPelicula->titulo = $request->input('titulo');
        $nouPelicula->pais = $request->input('pais');
        $nouPelicula->anoEstreno = $request->input('anoEstreno');
        $nouPelicula->numeroDeNominacionesOscar = $request->input('numeroDeNominacionesOscar');
        $nouPelicula->numeroOscars = $request->input('numeroOscars');
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
            // Guardem el nom del fitxer a la base de dades
            $nouPelicula->imatge = $nomImatge;
        }
        $nouPelicula->save();
        if($request->has('actores')){
            $nouPelicula->actores()->attach($request->input('actores'));
        }
        return redirect('/peliculas');
    }
    public function show($id)
    {
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $pelicula = \App\Models\Pelicula::findOrFail($id);
        return view('pelicula.show', compact('pelicula'));
    }
    public function destroy($id){
        // 1. Busca el llibre per ID
        // ...
        $pelicula = Pelicula::findOrFail($id);
        // 2. Crida el mètode d'esborrat
        // ...
        $pelicula->delete();
        return redirect('/peliculas');
    }
    public function edit($id){
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $pelicula = Pelicula::findOrFail($id);
        $actores = Actores::all();
        return view('pelicula.editar', compact('pelicula', 'actores'));
    }
    public function update(\Illuminate\Http\Request $request, $id){

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->titulo = $request->input('titulo') ?? 'asd';
        $pelicula->pais = $request->input('pais') ?? 'asd';
        $pelicula->anoEstreno = $request->input('anoEstreno') ?? '1';
        $pelicula->numeroDeNominacionesOscar = $request->input('numeroDeNominacionesOscar') ?? '1';
        $pelicula->numeroOscars = $request->input('numeroOscars') ?? '1';
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
            // Guardem el nom del fitxer a la base de dades
            $pelicula->imatge = $nomImatge;
        }
        if($request->has('actores')){
            $pelicula->actores()->attach($request->input('actores'));
        }
        $pelicula->save();

        return redirect('/peliculas');
    }
    public function peliculaxactor(){
        $pelicula = \App\Models\Pelicula::all();
        $actores =  \App\Models\Actores::all();
        return view('pelicula.peliculaxactor', compact('pelicula', 'actores'));
    }
}
