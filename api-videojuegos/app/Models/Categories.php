<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = ['categoria'];

    public function videojuegos() {
        return $this->belongsToMany(Videojuegos::class);
    }
}
