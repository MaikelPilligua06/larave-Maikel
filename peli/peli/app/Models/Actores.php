<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actores extends Model
{
    public function pelicula() {
        return $this->belongsToMany(Pelicula::class);
    }
}
