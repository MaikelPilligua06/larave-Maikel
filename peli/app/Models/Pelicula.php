<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //
    public function store(\Illuminate\Http\Request $request){
        $nouPelicula = new \App\Models\Pelicula();

        $nouPelicula->titulo = $request->input('titulo');
        $nouPelicula->pais = $request->input('pais');
        $nouPelicula->anoEstreno = $request->input('anoEstreno');
        $nouPelicula->numeroDeNominacionesOscar = $request->input('numeroDeNominacionesOscar');
        $nouPelicula->numeroOscars = $request->input('numeroOscars');

        $nouPelicula->save();

        return redirect('/peliculas');
    }
}
