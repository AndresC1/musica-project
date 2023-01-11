<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Http\Requests\StoreArtistaRequest;
use App\Http\Requests\UpdateArtistaRequest;
use App\Models\Cancion;
use Exception;
use stdClass;

class ArtistaController extends Controller
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
     * @param  \App\Http\Requests\StoreArtistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit(Artista $artista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistaRequest  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistaRequest $request, Artista $artista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artista $artista)
    {
        //
    }
    public function IndexAPI(){
        try {
            $artistas = array();
            Foreach(Artista::all() as $element){
                $artista = new stdClass;
                $artista->id = $element->id;
                $artista->nombre = $element->nombre;
                $artista->imagen = $element->imagen;
                $artista->canciones = $this->LimData($element->canciones);
                array_push($artistas, $artista);
            }
            return response($artistas, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
    }
    function LimData($datos){
        $valores = array();
        Foreach($datos as $dato){
            $elemento = Cancion::find($dato->IdCancion);
            $temp = new stdClass;
            $temp->id = $elemento->id;
            $temp->nombre = $elemento->nombre;
            array_push($valores, $temp);
        }
        return $valores;
    }
}
