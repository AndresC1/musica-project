<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Models\Album;
use App\Models\Artista;
use App\Models\cancion_artista;
use App\Models\Genero;
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
        try {
            return view('Canciones.lista')->with('Canciones', Cancion::all());
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
            return view('Canciones.create')->with('Generos', Genero::all())->with('Albumes', Album::all())->with('Artistas', Artista::all());
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error '.$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCancionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCancionRequest $request)
    {
        try {
            if($_FILES['archCancion']['type'] == 'audio/mpeg'){
                $limpNombre = str_replace(' ', '', $request['nombre']);
                $DatAlbum = Album::find($request['IdAlbum']);
                $newDat = new Cancion();
                $newDat->nombre = $request['nombre'];
                $newDat->archCancion = $limpNombre.'.mp3';
                $newDat->color = $request['color'];
                $newDat->anio = $request['anio'];
                $newDat->imagen = $DatAlbum->imagen;
                $newDat->IdGenero = $request['IdGenero'];
                $newDat->IdAlbum = $request['IdAlbum'];
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/Audio/';
                move_uploaded_file($_FILES['archCancion']['tmp_name'],$carpeta_destino.$limpNombre.'.mp3');
                $newDat->save();
                $TempID = $TempID = Cancion::where('nombre', $request['nombre'])->get();
                foreach($request['Artistas'] as $artista){
                    $registro = new cancion_artista();
                    $registro->IdCancion = $TempID[0]->id;
                    $registro->IdArtistas = $artista;
                    $registro->save();
                }
                return view('Mensaje.info')->with('informacion', 'La cancion fue almacenado con exito');
            }
            return view('Mensaje.info')->with('informacion', 'archivo de musica no correcto');
        } catch (Exception $e) {
            return view('Mensaje.info')->with('informacion', 'Ocurrio un error'.$e->getMessage());
        }
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
    public function ShowAPI(Cancion $cancion){
        try {
            $ObjCancion = new Cancion();
            $ObjCancion->id = $cancion->id;
            $ObjCancion->nombre = $cancion->nombre;
            $ObjCancion->imagen = $cancion->imagen;
            $ObjCancion->archCancion = $cancion->archCancion;
            $ObjCancion->color = $cancion->color;
            $ObjCancion->anio = $cancion->anio;
            $ObjCancion->genero = $this->LimData($cancion->genero);
            $ObjCancion->album = $this->LimData($cancion->album);
            $ObjCancion->artistas = $this->MuestraArtistas($cancion->artistas);
            return response($ObjCancion, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
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
