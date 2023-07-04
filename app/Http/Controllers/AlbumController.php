<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\Album\AlbumResource;
use App\Http\Resources\Album\AlbumInfoResource;
use App\Http\Resources\Artista\ArtistaInfoResource;
use App\Models\Artista;
use Exception;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('Album.lista', ['Albumes' => AlbumInfoResource::collection(Album::all())]);
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
            return view('Album.create', ['Artistas' => ArtistaInfoResource::collection(Artista::all())]);
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        try {
            $TMP_imagen = $_FILES['imagen'];
            if($TMP_imagen['type'] == 'image/jpeg' || $TMP_imagen['type'] == 'image/jpg'){
                $limpNombre = str_replace(' ', '', $request['nombre']);
                $albumData = new StoreAlbumRequest();
                $albumData["nombre"] = $request['nombre'];
                $albumData["imagen"] = $limpNombre.'.jpg';
                $albumData["IdArtista"] = $request['artista'];
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/img/Albumes/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$limpNombre.'.jpg');
                Album::create($albumData->all());
                return view('Mensaje.info')->with('informacion', 'El Album fue almacenado con exito');
            }
            return view('Mensaje.error', ['informacion' => 'Formato de imagen no correcto']);
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
        }
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
    public function ShowAPI(Album $album){
        try {
            if(Album::where('id', $album->id)->exists()){
                return response([
                    "album" => AlbumResource::make($album),
                    "message" => 'Album encontrado',
                    "status" => 200
                ], 200);
            } else{
                return response([
                    "message" => 'Album no encontrado',
                    "status" => 404
                ], 404);
            }
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
                "albumes" => AlbumResource::collection(Album::all()),
                "message" => 'Lista de albumes',
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
