<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Http\Requests\StoreArtistaRequest;
use App\Http\Requests\UpdateArtistaRequest;
use App\Http\Resources\ArtistaResource;
use Exception;

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
            return view('Artistas.lista', ['Artistas' => ArtistaResource::collection(Artista::all())]);
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
            return view('Artistas.create');
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
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
                $dataArtista = new StoreArtistaRequest();
                $dataArtista["nombre"] = $request['nombre'];
                $dataArtista["imagen"] = $limpNombre.'.jpg';
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/img/Artistas/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$limpNombre.'.jpg');
                Artista::create($dataArtista->all());
                return view('Mensaje.info')->with('informacion', 'El artista fue almacenado con exito');
            }
            return view('Mensaje.error')->with('informacion', 'imagen no correcta');
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
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
            return response([
                'artista' => ArtistaResource::make($artista),
                'message' => 'Artista encontrado',
                'status' => 200
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
                'artistas' => ArtistaResource::collection(Artista::all()),
                'message' => 'Lista de Artistas',
                'status' => 200
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
