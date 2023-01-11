<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Template.main');
});

Route::get('/generos', [GeneroController::class, 'index'])->name('ListGeneros');
Route::get('/albumes', [AlbumController::class, 'index'])->name('ListAlbumes');