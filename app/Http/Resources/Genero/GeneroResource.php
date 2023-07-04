<?php

namespace App\Http\Resources\Genero;

use App\Http\Resources\Cancion\CancionInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneroResource extends JsonResource
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
            'info' => new GeneroInfoResource($this),
            'canciones' => CancionInfoResource::collection($this->canciones),
        ];
    }
}
