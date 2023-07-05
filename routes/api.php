<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritoController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    // Genero
    Route::get('/generos', [GeneroController::class, 'IndexAPI']);
    Route::get('/genero/{genero}', [GeneroController::class, 'ShowAPI']);
    // Cancion
    Route::get('/canciones', [CancionController::class, 'IndexAPI']);
    Route::get('/cancion/{cancion}', [CancionController::class, 'ShowAPI']);
    // Album
    Route::get('/albumes', [AlbumController::class, 'IndexAPI']);
    Route::get('/album/{album}', [AlbumController::class, 'ShowAPI']);
    // Artista
    Route::get('/artistas', [ArtistaController::class, 'IndexAPI']);
    Route::get('/artista/{artista}', [ArtistaController::class, 'ShowAPI']);
    // Favoritos
    Route::apiResource('/favoritos', FavoritoController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::get('/favoritos/{type}/index', [FavoritoController::class, 'indexByType']);
});
