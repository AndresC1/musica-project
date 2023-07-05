<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Http\Requests\StoreFavoritoRequest;
use App\Http\Requests\UpdateFavoritoRequest;
use App\Http\Resources\Favorito\FavoritoResource;
use App\Models\Cancion;
use App\Models\Album;
use App\Models\Artista;
use Exception;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user = Auth::User();
            return response([
                'usuario' => $user->name,
                'favoritos' => FavoritoResource::collection(Favorito::where('user_id', $user->id)->get()),
                'message' => 'Lista de favoritos del usuario',
                'status' => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'Error al obtener la lista de favoritos del usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    public function indexByType($type)
    {
        try{
            $user = Auth::User();
            $type_favoritable = [
                'canciones' => 'App\Models\Cancion',
                'albumes' => 'App\Models\Album',
                'artistas' => 'App\Models\Artista',
            ];

            $favoritos = Favorito::where('user_id', $user->id)->where('favoritable_type', $type_favoritable[$type])->orderBy('id', 'desc')->get();
            return response([
                'usuario' => $user->name,
                'favoritos' => FavoritoResource::collection($favoritos),
                'message' => 'Lista de '.$type.' favoritos del usuario',
                'status' => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'Error al obtener la lista de favoritos del usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
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
     * @param  \App\Http\Requests\StoreFavoritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoritoRequest $request)
    {
        try{
            $user = Auth::User();
            $type_favoritable = [
                'cancion' => ['App\Models\Cancion', Cancion::class],
                'album' => ['App\Models\Album', Album::class],
                'artista' => ['App\Models\Artista', Artista::class],
            ];
            $type_model_favoritable = $type_favoritable[$request->favoritable_type][1];

            if (!$type_model_favoritable::where('id', $request->favoritable_id)->exists()){
                return response([
                    'message' => 'El favorito no existe',
                    'status' => 400
                ], 400);
            }

            $favorito = Favorito::where('user_id', $user->id)->where('favoritable_type', $type_favoritable[$request->favoritable_type][0])->where('favoritable_id', $request->favoritable_id)->first();
            if($favorito){
                return response([
                    'message' => 'El favorito ya existe',
                    'status' => 400
                ], 400);
            }

            $favorito = Favorito::create([
                'user_id' => $user->id,
                'favoritable_type' => $type_favoritable[$request->favoritable_type][0],
                'favoritable_id' => $request->favoritable_id,
            ]);

            return response([
                'favorito' => new FavoritoResource($favorito),
                'message' => 'Favorito creado correctamente',
                'status' => 201
            ], 201);
        } catch (Exception $e) {
            return response([
                'message' => 'Error al crear el favorito',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        try{
            return response([
                'favorito' => new FavoritoResource($favorito),
                'message' => 'Favorito obtenido correctamente',
                'status' => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'Error al obtener el favorito',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoritoRequest  $request
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoritoRequest $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorito $favorito)
    {
        try{
            if(!$favorito){
                return response([
                    'message' => 'El favorito no existe',
                    'status' => 400
                ], 400);
            }
            $favorito->delete();
            return response([
                'message' => 'Favorito eliminado correctamente',
                'status' => 200
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'Error al eliminar el favorito',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
