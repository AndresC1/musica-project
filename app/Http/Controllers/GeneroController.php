<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Http\Requests\StoreGeneroRequest;
use App\Http\Requests\UpdateGeneroRequest;
use App\Http\Resources\Genero\GeneroInfoResource;
use App\Http\Resources\Genero\GeneroResource;
use Exception;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('Genero.lista', ['Generos' => GeneroInfoResource::collection(Genero::all())]);
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
            return view('Genero.create');
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error:'.$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneroRequest $request)
    {
        try {
            $TMP_imagen = $_FILES['imagen'];
            if($TMP_imagen['type'] == 'image/jpeg' || $TMP_imagen['type'] == 'image/jpg'){
                $limpNombre = str_replace(' ', '', $request['nombre']);
                $dataRequest = new StoreGeneroRequest();
                $dataRequest["nombre"] = $request['nombre'];
                $dataRequest["imagen"] = $limpNombre.'.jpg';
                Genero::create($dataRequest->all());
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/img/Generos/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$limpNombre.'.jpg');
                return view('Mensaje.info', ['informacion' => 'El genero fue almacenado con exito']);
            }
            return view('Mensaje.error', ['informacion' => 'Formato de imagen no correcto']);
        } catch (Exception $e) {
            return view('Mensaje.error', ['informacion' => 'Ocurrio un error: '.$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneroRequest  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneroRequest $request, Genero $genero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        //
    }
    public function ShowAPI(Genero $genero){
        try {
            if(Genero::where('id', $genero->id)->exists()){
                return response([
                    "genero" => GeneroResource::make($genero),
                    "message" => "Genero encontrado",
                    "status" => 200
                ] , 200);
            } else{
                return response([
                    "message" => "Genero no encontrado",
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
                "generos" => GeneroResource::collection(Genero::all()),
                "message" => "Lista de generos",
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
