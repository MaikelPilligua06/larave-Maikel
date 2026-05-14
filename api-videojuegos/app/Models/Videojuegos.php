<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuegos extends Model
{
    protected $fillable = ['titol', 'fecha_lanzamiento', 'precio', 'empresas_id', 'pagines'];

    public function developers() {
        return $this->belongsTo(Empresa::class, 'empresas_id');
    }

    public function categorias() {
        return $this->belongsToMany(Categories::class, 'categories_videojuegos', 'videojuegos_id', 'categories_id');
    }
}
