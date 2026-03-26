<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Actores;
use Illuminate\Http\Request;

class ActoresController extends Controller
{
    //
    public function index()
    {

        $todoslosAcotres = \App\Models\Actores::all();
        return view('actores.index', ['actores' => $todoslosAcotres]);
    }
    public function destroy($id){
        $actores = Actores::findOrFail($id);
        // 2. Crida el mètode d'esborrat
        // ...
        $actores->delete();
        return redirect('/actores');
    }
    public function create(){
        return view('actores.create');
    }
    public function store(\Illuminate\Http\Request $request){
        $nouActor = new \App\Models\Actores();

        $nouActor->nombre = $request->input('nombre');
        $nouActor->pais = $request->input('pais');
        $nouActor->fechadeNacimiento = $request->input('fechadeNacimiento');
        $nouActor->numeroDePremios = $request->input('numeroDePremios');
        $nouActor->save();
        return redirect('/actores');

    }
    public function actorxpelicula(){
        $pelicula = \App\Models\Pelicula::all();
        $actores =  \App\Models\Actores::all();
        return view('actores.actorxpelicula', compact('pelicula', 'actores'));
    }
}
