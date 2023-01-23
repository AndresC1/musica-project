<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Http\Requests\StoreGeneroRequest;
use App\Http\Requests\UpdateGeneroRequest;
use Exception;
use stdClass;

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
            return view('Genero.lista')->with('Generos', Genero::all());
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
            return view('Genero.create');
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error');
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
                $newDat = new Genero();
                $newDat->nombre = $request['nombre'];
                $newDat->imagen = $limpNombre.'.jpg';
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/storage/img/Generos/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$limpNombre.'.jpg');
                $newDat->save();
                return view('Mensaje.info')->with('informacion', 'El genero fue almacenado con exito');
            }
            return view('Mensaje.error')->with('informacion', 'imagen no correcta');
        } catch (Exception $e) {
            return view('Mensaje.error')->with('informacion', 'Ocurrio un error'.$e->getMessage());
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
            $ObjGenero = new Genero();
            $ObjGenero->id = $genero->id;
            $ObjGenero->nombre = $genero->nombre;
            $ObjGenero->imagen = $genero->imagen;
            $ObjGenero->canciones = $genero->canciones;
            return response($ObjGenero, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
    }
    public function IndexAPI(){
        try {
            $generos = array();
            Foreach(Genero::all() as $element){
                $genero = new stdClass;
                $genero->id = $element->id;
                $genero->nombre = $element->nombre;
                $genero->imagen = $element->imagen;
                $genero->canciones = $element->canciones;
                array_push($generos, $genero);
            }
            return response($generos, 200);
        } catch (Exception $e) {
            return response(['A ocurrido un error', $e->getMessage()], 400);
        }
    }
}
