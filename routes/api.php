<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/generos', [GeneroController::class, 'IndexAPI']);
Route::get('/v1/canciones', [CancionController::class, 'IndexAPI']);
Route::get('/v1/albumes', [AlbumController::class, 'IndexAPI']);
Route::get('/v1/artistas', [ArtistaController::class, 'IndexAPI']);

Route::get('/v1/album/{album}', [AlbumController::class, 'ShowAPI']);
Route::get('/v1/artista/{artista}', [ArtistaController::class, 'ShowAPI']);
Route::get('/v1/cancion/{cancion}', [CancionController::class, 'ShowAPI']);
Route::get('/v1/genero/{genero}', [GeneroController::class, 'ShowAPI']);
