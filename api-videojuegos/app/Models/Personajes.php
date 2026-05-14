<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personajes extends Model
{
    //
    protected $fillable = ['nombre', 'especie', 'fecha_aparicion'];
}
