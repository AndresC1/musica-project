<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Http\Resources\Album\AlbumInfoResource;
use App\Http\Resources\Artista\ArtistaInfoResource;
use App\Http\Resources\Cancion\CancionResource;
use App\Http\Resources\Genero\GeneroInfoResource;
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
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
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
            return view('Canciones.create', [
                'Generos' => GeneroInfoResource::collection(Genero::all()),
                'Albumes' => AlbumInfoResource::collection(Album::all()),
                'Artistas' => ArtistaInfoResource::collection(Artista::all()),
            ]);
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
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
                $dataCancion = new StoreCancionRequest();
                $dataCancion["nombre"] = $request['nombre'];
                $dataCancion["archCancion"] = $limpNombre.'.mp3';
                $dataCancion["color"] = $request['color'];
                $dataCancion["anio"] = $request['anio'];
                $dataCancion["imagen"] = $DatAlbum->imagen;
                $dataCancion["IdGenero"] = $request['IdGenero'];
                $dataCancion["IdAlbum"] = $request['IdAlbum'];
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/Audio/';
                move_uploaded_file($_FILES['archCancion']['tmp_name'],$carpeta_destino.$limpNombre.'.mp3');
                Cancion::create($dataCancion->all());
                $TempID = $TempID = Cancion::where('nombre', $request['nombre'])->get();
                foreach($request['Artistas'] as $artista){
                    $registro = new cancion_artista();
                    $registro->IdCancion = $TempID[0]->id;
                    $registro->IdArtistas = $artista;
                    $registro->save();
                }
                return view('Mensaje.info', ['informacion' => 'Cancion agregada correctamente']);
            }
            return view('Mensaje.error', ['informacion' => 'El archivo no es un mp3']);
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
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
            return response([
                'cancion' => new CancionResource($cancion),
                "message" => "Cancion encontrada",
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                "error" => $e->getMessage(),
                "message" => 'A ocurrido un error',
                "status" => 400
            ], 400);
        }
    }
    public function IndexAPI(){
        try {
            return response([
                'canciones' => CancionResource::collection(Cancion::all()),
                "message" => "Lista de canciones",
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                "error" => $e->getMessage(),
                "message" => 'A ocurrido un error',
                "status" => 400
            ], 400);
        }
    }
}
