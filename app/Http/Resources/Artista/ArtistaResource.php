<?php

namespace App\Http\Resources\Artista;

use App\Http\Resources\Album\AlbumInfoResource;
use App\Http\Resources\Cancion\CancionInfoResource;
use App\Models\Cancion;
use App\Models\cancion_artista;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistaResource extends JsonResource
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
            'info' => ArtistaInfoResource::make($this),
            'canciones' => CancionInfoResource::collection($this->canciones),
            'canciones' => $this->canciones->map(function (cancion_artista $cancion_artista) {
                return CancionInfoResource::make(Cancion::find($cancion_artista->IdCancion));
            }),
            'albumes' => AlbumInfoResource::collection($this->albumes),
        ];
    }
}
