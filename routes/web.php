<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/canciones');
})->name('inicio');

Route::get('/albumes', [AlbumController::class, 'index'])->name('ListAlbumes');
Route::get('/albumes/create', [AlbumController::class, 'create'])->name('CreateAlbum');
Route::post('/album', [AlbumController::class, 'store'])->name('NuevoAlbum');

Route::get('/artistas', [ArtistaController::class, 'index'])->name('ListArtistas');
Route::get('/artistas/create', [ArtistaController::class, 'create'])->name('CreateArtista');
Route::post('/artista', [ArtistaController::class, 'store'])->name('NuevoArtista');

Route::get('/canciones', [CancionController::class, 'index'])->name('ListCanciones');
Route::get('/canciones/create', [CancionController::class, 'create'])->name('CreateCancion');
Route::post('/cancion', [CancionController::class, 'store'])->name('NuevaCancion');

Route::get('/generos', [GeneroController::class, 'index'])->name('ListGeneros');
Route::get('/generos/create', [GeneroController::class, 'create'])->name('CreateGenero');
Route::post('/genero', [GeneroController::class, 'store'])->name('NuevoGenero');