<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $fillable = ['nom', 'nacionalitat'];

    public function videojuegos() {
        return $this->hasMany(Videojuegos::class);
    }
}
