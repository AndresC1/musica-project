<?php

namespace App\Http\Resources\Album;

use App\Http\Resources\Artista\ArtistaInfoResource;
use App\Http\Resources\Cancion\CancionInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
            'info' => AlbumInfoResource::make($this),
            'artista' => ArtistaInfoResource::make($this->artista),
            'canciones' => CancionInfoResource::collection($this->canciones),
        ];
    }
}
