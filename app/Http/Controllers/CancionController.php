<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Models\Artista;
use Exception;
use stdClass;

class CancionController extends Controller
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
     * @param  \App\Http\Requests\StoreCancionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCancionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancion $cancion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCancionRequest  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCancionRequest $request, Cancion $cancion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancion $cancion)
    {
        //
    }
    public function IndexAPI(){
        try {
            $canciones = array();
            foreach(Cancion::all() as $cancion){
                $ObjCancion = new stdClass;
                $ObjCancion->id = $cancion->id;
                $ObjCancion->nombre = $cancion->nombre;
                $ObjCancion->imagen = $cancion->imagen;
                $ObjCancion->archCancion = $cancion->archCancion;
                $ObjCancion->color = $cancion->color;
                $ObjCancion->anio = $cancion->anio;
                $ObjCancion->genero = $this->LimData($cancion->genero);
                $ObjCancion->album = $this->LimData($cancion->album);
                $ObjCancion->artistas = $this->MuestraArtistas($cancion->artistas);
                array_push($canciones, $ObjCancion);
            }
            return response($canciones, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
    }
    function LimData($ListaDatos){
        $element = new stdClass;
        $element->id = $ListaDatos->id;
        $element->nombre = $ListaDatos->nombre;
        $element->imagen = $ListaDatos->imagen;
        return $element;
    }
    function MuestraArtistas($datos){
        $salida = array();
        Foreach($datos as $dat){
            $valores = Artista::find($dat->IdArtistas);
            $val = new stdClass;
            $val->nombre = $valores->nombre;
            $val->imagen = $valores->imagen;
            array_push($salida, $val);
        }
        return $salida;
    }
}
