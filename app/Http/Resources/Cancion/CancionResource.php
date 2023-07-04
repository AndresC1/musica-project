<?php

namespace App\Http\Resources\Cancion;

use App\Http\Resources\Album\AlbumInfoResource;
use App\Http\Resources\Artista\ArtistaInfoResource;
use App\Http\Resources\Genero\GeneroInfoResource;
use App\Models\Artista;
use App\Models\cancion_artista;
use Illuminate\Http\Resources\Json\JsonResource;

class CancionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'info' => CancionInfoResource::make($this),
            'genero' => GeneroInfoResource::make($this->genero),
            'album' => AlbumInfoResource::make($this->album),
            'artistas' => $this->artistas->map(function (cancion_artista $cancion_artista) {
                return ArtistaInfoResource::make(Artista::find($cancion_artista->IdArtistas));
            }),
        ];
    }
}
