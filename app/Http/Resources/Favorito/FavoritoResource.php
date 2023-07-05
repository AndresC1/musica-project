<?php

namespace App\Http\Resources\Favorito;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cancion\CancionInfoResource;
use App\Http\Resources\Album\AlbumInfoResource;
use App\Http\Resources\Artista\ArtistaInfoResource;

class FavoritoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $type_favoritable = [
            'App\Models\Cancion' => ['Cancion', CancionInfoResource::class],
            'App\Models\Album' => ['Album', AlbumInfoResource::class],
            'App\Models\Artista' => ['Artista', ArtistaInfoResource::class],
        ];

        $favoritable = $this->favoritable;
        $favoritableResource = $type_favoritable[$this->favoritable_type][1];

        return [
            'id' => $this->id,
            'favoritable_type' => $type_favoritable[$this->favoritable_type][0],
            'favoritable_id' => $this->favoritable_id,
            'favoritable_data' => new $favoritableResource($favoritable),
        ];
    }
}
