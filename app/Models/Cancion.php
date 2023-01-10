<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'archCancion', 'color', 'anio', 'IdGenero', 'IdAlbum', 'IdArtistas'];

    function genero(){
        return $this->belongsTo(Genero::class, 'IdGenero');
    }

    function album(){
        return $this->belongsTo(Album::class, 'IdAlbum');
    }

    function artista(){
        return $this->belongsToMany(Artista::class, 'IdArtistas');
    }
}
