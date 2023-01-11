<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancion_artista extends Model
{
    use HasFactory;

    protected $fillable = ['IdCancion', 'IdArtistas'];

    function canciones(){
        return $this->belongsToMany(Cancion::class, 'IdCancion');
    }
    function artistas(){
        return $this->belongsToMany(Artista::class, 'IdArtistas');
    }
}
