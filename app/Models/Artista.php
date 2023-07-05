<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen'];

    function albumes(){
        return $this->hasMany(Album::class, 'IdArtista');
    }

    function canciones(){
        return $this->hasMany(cancion_artista::class, 'IdArtistas');
    }

    function favoritos(){
        return $this->morphMany(Favorito::class, 'favoritable');
    }
}
