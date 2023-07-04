<?php

namespace App\Http\Resources\Cancion;

use Illuminate\Http\Resources\Json\JsonResource;

class CancionInfoResource extends JsonResource
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
            'id' => $this->id,
            'nombre' => $this->nombre,
            'imagen' => $this->imagen,
            'linkCancion' => $this->archCancion,
            'color' => $this->color,
            'anio' => $this->anio,
        ];
    }
}
