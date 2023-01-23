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
        try {
            return view('Artistas.lista')->with('Artistas', Artista::all());
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('Artistas.create');
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistaRequest $request)
    {
        try {
            $TMP_imagen = $_FILES['imagen'];
            if($TMP_imagen['type'] == 'image/jpeg' || $TMP_imagen['type'] == 'image/jpg'){
                $limpNombre = str_replace(' ', '', $request['nombre']);
                $newDat = new Artista();
                $newDat->nombre = $request['nombre'];
                $newDat->imagen = $limpNombre.'.jpg';
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/img/Artistas/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$limpNombre.'.jpg');
                $newDat->save();
                return view('Mensaje.info')->with('informacion', 'El artista fue almacenado con exito');
            }
            return view('Mensaje.error')->with('informacion', 'imagen no correcta');
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error'.$e->getMessage());
        }
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
    public function ShowAPI(Artista $artista){
        try {
            $ObjArtista = new Artista();
            $ObjArtista->id = $artista->id;
            $ObjArtista->nombre = $artista->nombre;
            $ObjArtista->imagen = $artista->imagen;
            $ObjArtista->canciones = $this->LimData($artista->canciones);
            return response($ObjArtista, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
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
            $temp->imagen = $elemento->imagen;
            array_push($valores, $temp);
        }
        return $valores;
    }
}
