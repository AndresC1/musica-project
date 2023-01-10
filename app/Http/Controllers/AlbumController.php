<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Cancion;
use Exception;
use stdClass;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
    public function IndexAPI(){
        try {
            $albumes = array();
            foreach(Album::all() as $album){
                foreach($album->canciones as $cancion){
                    
                }
                $prueba = new stdClass;
                $prueba->id = $album->id;
                $prueba->nombre = $album->nombre;
                $prueba->imagen = $album->imagen;
                $prueba->artista = $this->LimArtista($album->artista);
                $prueba->canciones = $this->LimCanciones($album->canciones);
                array_push($albumes, $prueba);
            }
            return response($albumes, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
    }
    function LimCanciones($ListCanciones){
        $canciones = array();
        foreach($ListCanciones as $DatosCancion){
            $cancion = new stdClass;
            $cancion->id = $DatosCancion->id;
            $cancion->nombre = $DatosCancion->nombre;
            $cancion->imagen = $DatosCancion->imagen;
            array_push($canciones, $cancion);
        }
        return $canciones;
    }
    function LimArtista($ListArtista){
        $datos = new stdClass;
        $datos->id = $ListArtista->id;
        $datos->nombre = $ListArtista->nombre;
        $datos->artista = $ListArtista->imagen;
        return $datos;
    }
}
