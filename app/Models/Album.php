<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'IdArtista'];

    function artista(){
        return $this->belongsTo(Artista::class, 'IdArtista');
    }

    function canciones(){
        return $this->hasMany(Cancion::class, 'IdAlbum');
    }

    function favoritos(){
        return $this->morphMany(Favorito::class, 'favoritable');
    }
}
