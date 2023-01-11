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
        return view('Genero.lista')->with('Generos', Genero::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneroRequest $request)
    {
        Genero::created($request->all());
        return view('Mensaje.info')->with('informacion', 'El genero fue almacenado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        return view('Genero.show')->with('dato', $genero);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        return view('Genero.editar')->with('dato', $genero);
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
        $genero->update($request->all());
        return view('Mensaje.info')->with('informacion', 'El genero fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return view('Mensaje.info')->with('informacion', 'El genero fue actualizado con exito');
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
